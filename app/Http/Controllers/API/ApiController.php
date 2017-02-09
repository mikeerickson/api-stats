<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use \App\Services\ApiService;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	protected $statusCode;
	protected $endpoint;
	protected $limit;
	protected $query;
	protected $queryString;
	protected $token;
	protected $api;

	function __construct(Request $request)
	{
		$this->api = new ApiService($request);

		$this->queryString = $request->query();
		$this->requestUri  = $request->getRequestUri();
		$this->endpoint    = $this->api->getEndpoint($request);

		$this->query       = isset($this->queryString['q']) ? $this->queryString['q'] : '';
		$this->limit       = isset($this->queryString['_limit']) ? $this->queryString['_limit'] : 10;
		$this->token       = $this->getToken($request);

	}

	//	get - Get all rows for endpoint ($this->limit will be used)
	public function index()
	{
		$data = $this->api->buildQuery($this->endpoint, $this->query, $this->limit);
		if (gettype($data) === 'object') {
			return $this->respondWithSuccess($data);
		} else {
			return $this->respondInvalidQuery($data);
		}
	}

	// post - Create single endpoint
	public function store(Request $request)
	{
		$response = $this->api->post($request);
		return response($response, $response['status_code']);
	}

	// get - Get single endpoint based on `endpoint` id
	public function show($id) {
		$response = $this->api->get($id);
		return response($response, $response['status_code']);
	}

	// put -Update single endpoint
	public function update($id, Request $request) {
		$response = $this->api->put($id, $request)
			->getOriginalContent();

		return response($response, $response['status_code']);
	}

	// delete - Delete single endpoint
	public function destroy($id) {
		$response = $this->api->delete($id);
		return response($response, $response["status_code"]);
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
