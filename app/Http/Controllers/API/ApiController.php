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

	function __construct(Request $request)
	{
		$this->limit               = 5;
		$this->queryString         = $request->query();
		$this->endpoint            = explode("/", $request->getPathInfo())[3];
		$this->yearId              = isset($this->queryString['yearId']) ? (int)$this->queryString['yearId'] : 2015;
		$this->tablesWithoutYearId = ['players','homegames','parks','schools','teamsfranchises'];
	}

	//	get - Get all rows for endpoint ($this->limit will be used)
	public function index() {
		if(!in_array($this->endpoint, $this->tablesWithoutYearId)) {
			return DB::table($this->endpoint)->where('yearId','=',$this->yearId)->limit($this->limit)->get();
		}
		return DB::table($this->endpoint)->limit($this->limit)->get();
	}

	// post - Create single endpoint
	public function store(Request $request) {

		try {
			// query to see if supplied playerID already exists?
			// create routine to generate primary key (different for each endpoint)
			$result = DB::table($this->endpoint)
				->insert($request->all());
		} catch (QueryException $e) {
			die($e->getMessage());
		}

		if ($result) {
			$response = [
				'result' => 201,
				'message' => str_singular($this->endpoint) . ' Created Successfully',
				'key'     => $request->input('playerID')
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
		if(!in_array($this->endpoint, $this->tablesWithoutYearId)) {
			return DB::table($this->endpoint)
				->where('playerID','=', $id)
				->where('yearID','=', $this->yearId)
				->limit(1)
				->get();
		}
		$key = str_singular($this->endpoint) . 'id';
		return DB::table($this->endpoint)->where($key,'=', $id)->get();
	}

	// put -Update single endpoint
	public function update($id) {
		return 'API Update';
	}

	// delete - Delete single endpoint
	public function destroy($id) {
		return 'API Delete';
	}

}
