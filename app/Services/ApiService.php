<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ApiService
{
    protected $endpoint;
    protected $queryString;
    protected $query;
    protected $requestedUri;
    protected $request;
    protected $tablesWithoutYears;
    protected $limit;
    protected $token;
    protected $trialLimit;
    protected $model;

    public function __construct(Request $request)
    {
        $this->tablesWithoutYears = ['players','teamsfranchises','parks'];

        $this->queryString  = $request->query();
        $this->request      = $request;
        $this->trialLimit   = env('APP_TRIAL_LIMIT') or 10;
        $this->query        = isset($this->queryString['q'])     ? $this->queryString['q'] : '';
        $this->limit        = isset($this->queryString['limit']) ? $this->queryString['limit'] : $this->trialLimit;

        $this->requestedUri = $request->getRequestUri();
        $this->endpoint     = $this->getEndpoint($request);
        $this->token        = $this->getToken();

        if ($this->isTrialToken($this->token)) {
            if ($this->limit > $this->trialLimit) {
                $this->limit = $this->trialLimit;
            }
        }
    }

    public function getEndpoint()
    {
        $endpoint = "";

        $parts = explode("/", $this->request->getPathInfo());
        if (sizeof($parts) >= 3) {
            $endpoint = $parts[3];
        }
        return $endpoint;
    }

    public function get($id = null)
    {
        $errors = [];

        if ($id === null) {
            $data = $this->buildQuery($this->endpoint, $this->query, $this->limit);
            if (array_has($data, 'sql')) {
                $errors = $data;
                $data = [];
            }
        } else {
            try {
                $model = "App\\Models\\" . ucwords($this->endpoint);
                if ($this->hasModel($model)) {
                    $data = $model::with('player')
                        ->where('playerID', '=', $id)
                        ->where('yearID', '=', '2015')
                        ->get();
                } else {
                    // insert yearID if not supplied
                    if (!in_array($this->endpoint, $this->tablesWithoutYears)) {
                        $data = DB::table($this->endpoint)
                            ->where('playerID', '=', $id)
                            ->where('yearID', '=', '2015')
                            ->get();
                    }

                    $data = DB::table($this->endpoint)
                        ->where('playerID', '=', $id)
                        ->get();
                }
            } catch (QueryException $e) {
                $errors = [
                    'message' => 'Internal SQL Error',
                    'sql'     => $e->getMessage(),
                ];
                $data = null;
            }
        }

        $response = [
            'status'      => ($data) ? "success" : "fail",
            'status_code' => ($data) ? 200 : 400,
            'api_request' => $this->request->method() . ' ' .$this->requestedUri
        ];

        if (sizeof($errors) > 0) {
            $response['message'] = $errors['message'];
            $response['sql']     = $errors['sql'];
            $response['status']  = "error";
        }

        if ($data) {
            $response['data'] = $data;
        }

        $response = array_merge($response, $errors);
        return response($response, $response['status_code']);
    }

    public function put($id, $request)
    {
        $record = DB::table($this->endpoint)->find($id);

        $id       = (isset($record->id)) ? $record->id : 0;
        $playerID = (isset($record->playerID)) ? $record->playerID : '0';
        $data     = null;

        if (($id > 0) || ($playerID !== '')) {
            $data = $request->all();
            unset($data['token']); // remove token in case it was supplied as part of form post

            if ($this->hasPlayerID($this->endpoint)) {
                $result = DB::table($this->endpoint)
                    ->where('id', $id)
                    ->orWhere('playerID', $playerID)
                    ->update($data);
            } else {
                $result = DB::table($this->endpoint)
                    ->where('id', $id)
                    ->update($data);
            }
        }

        $response = [
            'status'      => ($data) ? "success" : "fail",
            'status_code' => ($data) ? 201 : 400,
            'api_request' => $this->requestedUri,
            'id'          => $id,
            'message'     => ($data)
                ? ucwords($this->endpoint) . " `id` $id Updated Successfully"
                : ucwords($this->endpoint) . "Endpoint Not Found"
        ];

        if ($response['status_code'] === 201) {
            $response['data'] = $data;
        }

        return response($response, $response['status_code']);
    }

    public function post(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['token']); // remove token in case it was supplied as part of form post
            // query to see if supplied playerID already exists?
            $id = DB::table($this->endpoint)
                ->insertGetId($data);
        } catch (QueryException $e) {
            die($e->getMessage());
        }

        if ($id > 0) {
            $response = [
                'status_code' => 201,
                'status'  => 'success',
                'message' => ucwords(str_singular($this->endpoint)) . ' Created Successfully',
                'id'      => $id,
            ];
        } else {
            //			throw new HttpException(400);
            $response = [
                'status_code' => 400,
                'status'  => 'fail',
                'message' => 'An error occurred creating ' . ucwords(str_singular($this->endpoint))
            ];
        }

        return $response;
    }

    public function delete($id)
    {
        $result = DB::table($this->endpoint)
            ->where('id', '=', $id)
            ->delete();

        $response = [
            'status'      => ($result) ? "success" : "fail",
            'status_code' => ($result) ? 200 : 400,
            'api_request' => $this->requestedUri,
            'id'          => $id,
            'message'     => ($result)
                ? ucwords($this->endpoint) ." `id` $id Deleted Successfully"
                : ucwords($this->endpoint) ." Endpoint `id` $id Not Found"
        ];

        return $response;
    }

    public function buildQuery($endpoint = null, $q = null, $limit = 3)
    {
        $yearID       = 2015;
        $whereClause  = [];
        $yearSupplied = false;
        $keys         = [];
        $values       = [];
        $errors       = [];

        if ($q === 'schema') {
            $result = $this->getSchema($this->endpoint);
            return $result;
        }

        // refactor this to use regex so users can supply delimiters
        // =, >, <, >=, <=, <>, #
        if ($q !== '') {
            foreach (explode(',', $q) as $param) {
                list($keys[], $values[]) = explode(':', $param);
            }
        }

        // build where clause
        for ($i = 0; $i < sizeof($keys); $i++) {
            if ($keys[$i] === 'yearID') {
                $yearSupplied = true;
            }
            $whereClause[] = [$keys[$i], '=', $values[$i]];
        }

        // insert yearID if not supplied
        if (!in_array($endpoint, $this->tablesWithoutYears)) {
            if (!$yearSupplied) {
                $whereClause[] = ['yearID', '=', $yearID];
            }
        }

        $model = "App\\Models\\" . ucwords($this->endpoint);
        if ($this->hasModel($model)) {
            $result = $model::with('player')
                ->where($whereClause)
                ->limit($limit)
                ->get();
        } else {
            try {
                $result = DB::table($endpoint)
                    ->where($whereClause)
                    ->limit($limit)
                    ->get();
            } catch (QueryException $e) {
                $errors = [
                    'status'  => 'SQL Error',
                    'message' => 'Internal SQL Error',
                    'sql'     => $e->getMessage(),
                ];
            }
        }

        if (sizeof($errors) > 0) {
            $result = array_merge($errors);
        }

        return $result;
    }

    public function getToken()
    {
        $token = $this->request->header('API-Token')
            ? $this->request->header('API-Token')
            : array_get($this->request->query(), 'token');

        if ($token === "") {
            $token = "c3be77b4-c9f1-3109-8729-e6704c93ef41";
        }
        return $token;
    }

    public function isTrialToken($token)
    {
        return $token === 'c3be77b4-c9f1-3109-8729-e6704c93ef41';
    }

    public function trialLimit()
    {
        return $this->trialLimit;
    }

    public function hasPlayerID($endpoint)
    {
        $noPlayerID = [
            'homegames',
            'parks',
            'schools',
            'seriespost',
            'teams',
            'teamsfranchises',
            'teamshalf'
        ];

        return ! in_array($endpoint, $noPlayerID);
    }

    public function hasModel($model)
    {
        return class_exists($model);
    }

    public function getSchema($tablename)
    {
        $result = DB::select("DESCRIBE {$this->endpoint}");
        $model  = "App\\Models\\" . str_singular(ucwords($this->endpoint));
        if ($this->hasModel($model)) {
            $hidden = ((new $model)->getHidden());
            $filtered = [];
            foreach ($result as &$value) {
                if (!in_array($value->Field, $hidden)) {
                    $filtered[] = $value;
                }
            }
            return $filtered;
        }
        return $result;
    }
}
