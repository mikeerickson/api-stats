<?php

namespace App\Http\Controllers\API;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
	protected $endpoint;
	protected $limit;
	protected $yearId;
	protected $tablesWithoutYears;
	protected $query;

	function __construct(Request $request)
	{
		$this->tablesWithoutYears = ['players','teamsfranchises'];
		$this->queryString = $request->query();
		$this->endpoint    = explode("/", $request->getPathInfo())[3];
		$this->yearId      = isset($this->queryString['yearId']) ? (int)$this->queryString['yearId'] : 2015;
		$this->query       = isset($this->queryString['q']) ? $this->queryString['q'] : '';
		$this->limit       = isset($this->queryString['_limit']) ? $this->queryString['_limit'] : 10;
	}

	//	get - Get all rows for endpoint ($this->limit will be used)
	public function index() {
		return $this->buildQuery($this->endpoint, $this->query, $this->limit);
	}

	// post - Create single endpoint
	public function store(Request $request) {

		try {
			$data = $request->all();
			unset($data['token']); // remove token in case it was supplied as part of form post
			// query to see if supplied playerID already exists?
			$result = DB::table($this->endpoint)
				->insertGetId($data);

		} catch (QueryException $e) {
			die($e->getMessage());
		}

		if ($result > 0) {
			$response = [
				'result' => 201,
				'message' => str_singular($this->endpoint) . ' Created Successfully',
				'key'     => $result
			];
		} else {
			throw new HttpException(400);
			$response = [
				'result' => 400,
				'message' => 'An error occurred creating ' . str_singular($this->endpoint)
			];
		}

		// send response
		return response($response, $response['result']);
	}

	// get - Get single endpoint based on `endpoint` id
	public function show($id) {
		return DB::table($this->endpoint)->where('id','=', $id)->get();
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

			$response = [
				"result"  => 201,
				"id"      => $id,
				"message" => ucwords($this->endpoint) . " `id` $record->id Updated Successfully"
			];
		} else {
			$response = [
				"result" => 400,
				"message" => "Unable to update " .ucwords($this->endpoint) ." `id` $id, record not found."
			];
		}

		return response($response, $response["result"]);
	}

	// delete - Delete single endpoint
	public function destroy($id) {
		$result = DB::table($this->endpoint)->where('id','=', $id)->delete();
		if($result) {
			$response = [
				"result" => 200,
				"key" => $id,
				"message" => ucwords($this->endpoint) ." `id` $id Deleted Successfully"
			];
		} else {
			$response = [
				"result" => 400,
				"key" => $id,
				"message" => "Unable to delete ". ucwords($this->endpoint) ." `id` $id, record not found."
			];
		}
		return response($response, $response["result"]);
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

		$result = DB::table($endpoint)
			->where($whereClause)
			->limit($limit)
			->get();

		return $result;
	}
}
