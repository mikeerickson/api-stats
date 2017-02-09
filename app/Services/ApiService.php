<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class ApiService
{
	protected $endpoint;
	protected $queryString;
	protected $requestedUri;
	protected $request;
	protected $tablesWithoutYears;

	function __construct(Request $request)
	{
		$this->request = $request;
		$this->tablesWithoutYears = ['players','teamsfranchises','parks'];

		$this->queryString  = $request->query();
		$this->requestedUri = $request->getRequestUri();
		$this->endpoint     = $this->getEndpoint($request);
	}

	public function getEndpoint()
	{
		$endpoint = "";

		 $parts = explode("/", $this->request->getPathInfo());
		if(sizeof($parts) >= 3) {
			$endpoint = $parts[3];
		}
		return $endpoint;
	}

	public function get($id)
	{
		$response = [];
		$data = DB::table($this->endpoint)->where('id','=', $id)->first();

		$response = [
			'status'      => ($data) ? "success" : "fail",
			'status_code' => ($data) ? 200 : 400,
			'api_request' => $this->requestedUri,
			'message'     => ($data)
				? ucwords($this->endpoint) ." `id` $data->id Found"
				: ucwords($this->endpoint) ." Endpoint Not Found"
		];

		if($data) {
			$response['data'] = $data;
		}
		return $response;
	}

	public function put($id, $request)
	{
		$record = DB::table($this->endpoint)->find($id);
		$id     = (isset($record->id)) ? $record->id : 0;
		$data   = null;

		if($id > 0) {
			$data = $request->all();
			unset($data['token']); // remove token in case it was supplied as part of form post

			$result = DB::table($this->endpoint)
				->where('id', $id)
				->update($data);
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

		if($response['status_code'] === 201) {
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
			->where('id','=', $id)
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

	public function buildQuery($endpoint = null, $q = null, $limit = 3) {
		$yearID       = 2015;
		$whereClause  = [];
		$yearSupplied = false;
		$keys         = [];
		$values       = [];

		// refactor this to use regex so users can supply delimiters
		// =, >, <, >=, <=, <>, #
		if($q !== '') {
			foreach(explode(',', $q) as $param)
			{
				list($keys[],$values[]) = explode(':',$param);
			}
		}

		// build where clause
		for($i = 0; $i < sizeof($keys); $i++) {
			if($keys[$i] === 'yearID') {
				$yearSupplied = true;
			}
			$whereClause[] = [$keys[$i], '=', $values[$i]];
		}

		// insert yearID if not supplied
		if(!in_array($endpoint, $this->tablesWithoutYears)) {
			if(!$yearSupplied) {
				$whereClause[] = ['yearID', '=', $yearID];
			}
		}
		try {
			$result = DB::table($endpoint)
				->where($whereClause)
				->limit($limit)
				->get();

		} catch (QueryException $e) {
			$result = $e->getMessage();
		}

		return $result;
	}

}