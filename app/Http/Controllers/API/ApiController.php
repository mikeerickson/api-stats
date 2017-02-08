<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	protected $statusCode;
	protected $endpoint;
	protected $limit;
	protected $yearId;
	protected $tablesWithoutYears;
	protected $query;
	protected $queryString;
	protected $token;

	function __construct(Request $request)
	{
		$this->tablesWithoutYears = ['players','teamsfranchises','parks'];

		$this->queryString = $request->query();
		$this->requestUri  = $request->getRequestUri();
		$this->endpoint    = explode("/", $request->getPathInfo())[3];
		$this->yearId      = isset($this->queryString['yearId']) ? (int)$this->queryString['yearId'] : 2015;
		$this->query       = isset($this->queryString['q']) ? $this->queryString['q'] : '';
		$this->limit       = isset($this->queryString['_limit']) ? $this->queryString['_limit'] : 10;
		$this->token       = $this->getToken($request);
	}

	//	get - Get all rows for endpoint ($this->limit will be used)
	public function index() {
		$data = $this->buildQuery($this->endpoint, $this->query, $this->limit);
		if(gettype($data) === 'object') {
			return $this->respondWithSuccess($data);
		} else {
			return $this->respondInvalidQuery($data);
		}
}

	// post - Create single endpoint
	public function store(Request $request) {

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
				'status'  => 'success',
				'message' => ucwords(str_singular($this->endpoint)) . ' Created Successfully',
				'id'      => $id,
			];
			return response($response, 201);
		} else {
//			throw new HttpException(400);
			$response = [
				'status'  => 'fail',
				'message' => 'An error occurred creating ' . ucwords(str_singular($this->endpoint))
			];
			return response($response, 400);
		}
	}

	// get - Get single endpoint based on `endpoint` id
	public function show($id) {
		$data = DB::table($this->endpoint)->where('id','=', $id)->first();
		if($data) {
			return $this->respondWithSuccess($data);
		} else {
			return $this->respondNotFound(ucwords($this->endpoint) .' Endpoint Not Found');
		}
	}

	// put -Update single endpoint
	public function update($id, Request $request) {
		$record = DB::table($this->endpoint)->find($id);
		if(isset($record->id)) {
			$data = $request->all();
			unset($data['token']); // remove token in case it was supplied as part of form post

			$result = DB::table($this->endpoint)
				->where('id', $id)
				->update($data);

			return $this->setStatusCode(201)->respondUpdated(ucwords($this->endpoint) . " Updated Successfully", $record->id, $data);
		} else {
			return $this->setStatusCode(400)->respondWithError("An error occurred updating `id` $id, record not found");
		}
	}

	// delete - Delete single endpoint
	public function destroy($id) {
		$result = DB::table($this->endpoint)->where('id','=', $id)->delete();
		if($result) {
			$response = [
				"result" => 200,
				"id" => $id,
				"message" => ucwords(str_singular($this->endpoint)) ." `id` $id Deleted Successfully"
			];
		} else {
			$response = [
				"result" => 400,
				"id" => $id,
				"message" => "Unable to delete ". ucwords(str_singular($this->endpoint)) ." `id` $id, record not found."
			];
		}
		return response($response, $response["result"]);
	}

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	function buildQuery($endpoint = null, $q = null, $limit = 3) {
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

	function respond($status = "success", $data, $headers = [])
	{
		$data = [
			"status"      => $status,
			"api_request" => $this->requestUri,
			"data"        => $data
		];

		if($this->isDebug()) {
			$data['debug'] = $this->debug_info();
		}

		return response($data, $this->getStatusCode());
	}

	public function respondWithSuccess($data)
	{
		return $this->setStatusCode(200)->respond("success", $data);
	}

	public function respondWithError($message = 'An Error Occurred')
	{
		$this->setStatusCode(403);
		$data = [
			"status"      => "fail",
			'message'     => $message,
			"api_request" => $this->requestUri
		];

		return response($data, $this->getStatusCode());
	}

	public function respondNotFound($message = 'Endpoint Not Found')
	{
		return $this->setStatusCode(404)->respondWithError($message);
	}

	public function respondDeleted($message = 'Endpoint Deleted Successfully', $id = -1)
	{
		return $this->setStatusCode(200)->respond([
			'id'          => (int)$id,
			'message'     => $message,
			'status_code' => $this->getStatusCode(),
			"api_request" => $this->requestUri
		]);
	}

	public function respondUpdated($message = "Endpoint Updated Successfully", $id = null, $updatedData = [])
	{
		$data = [
			"status"      => "success",
			"message"     => $message,
			"id"          => $id,
			"api_request" => $this->requestUri
		];

		if(sizeof($updatedData) > 0) {
			$data["data"] = $updatedData;
		}

		return response($data, $this->getStatusCode());
	}

	public function respondCreated($message = 'Endpoint Created Successfully', $id = 0)
	{
		return $this->setStatusCode(201)->respond([
			'message'     => $message,
			'id'          => $id,
			'status_code' => $this->getStatusCode(),
			"api_request" => $this->requestUri
		]);
	}

	public function respondInvalidQuery($sql) {
		$data = [
			"status"      => "fail",
			"api_request" => $this->requestUri,
			"message"     => $sql
		];

		return response($data, 403);
	}

	private function getToken(Request $request) {
		$token = $request->header('API-Token')
			? $request->header('API-Token')
			: array_get($this->queryString,'token');

		return $token;
	}

	public function isDebug() {
		if(isset($this->queryString['debug'])) {
			return $this->queryString['debug'] === 'true';
		}
		return false;
	}

	public function debug_info() {
		return [
			'db_source' => env('DB_CONNECTION'),
			'db_name'   => env('DB_DATABASE'),
			'api_token' => $this->token
		];
	}

}
