<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

/**
 * Class ApiController
 * @package App\Http\Controllers\API
 */
class ApiController extends Controller
{
    /**
     * @var ApiService
     */
    protected $api;
    /**
     * @var string
     */
    protected $endpoint;
    /**
     * @var int
     */
    protected $limit;
    /**
     * @var string
     */
    protected $query;
    /**
     * @var array|string
     */
    protected $queryString;
    /**
     * @var
     */
    protected $statusCode;
    /**
     * @var array|mixed|string
     */
    protected $token;

    /**
     * ApiController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->api = new ApiService($request);

        $this->queryString = $request->query();
        $this->requestUri  = $request->getRequestUri();
        $this->endpoint    = $this->api->getEndpoint($request);

        $this->query       = isset($this->queryString['q']) ? $this->queryString['q'] : '';
        $this->limit       = isset($this->queryString['limit']) ? $this->queryString['limit'] : $this->api->trialLimit();
        $this->token       = $this->api->getToken($request);

        if ($this->api->isTrialToken($this->token)) {
            if ($this->limit >= $this->api->trialLimit()) {
                $this->limit = $this->api->trialLimit();
            }
        }
    }

    //	get - Get all rows for endpoint ($this->limit will be used)

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $response = $this->api->get()->getOriginalContent();
        return $this->respond($response, $response['status_code']);
    }

    // post - Create single endpoint

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $response = $this->api->post($request);
        return response($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        return $this->store($request);
    }

    // get - Get single endpoint based on `endpoint` id

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        $response = $this->api->get($id)->getOriginalContent();
        return $this->respond($response, $response['status_code']);
    }

    // put -Update single endpoint

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id, Request $request)
    {
        $response = $this->api->put($id, $request)
            ->getOriginalContent();

        return $this->respond($response, $response['status_code']);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function edit($id, Request $request)
    {
        return $this->update($id, $request);
    }

    // delete - Delete single endpoint

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        $response = $this->api->delete($id);

        return $this->respond($response, $response['status_code']);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        return $this->destroy($id);
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respond($data, $headers = [])
    {
        if ($this->isDebug()) {
            $debugData = ["debug" => $this->addDebugInfo(sizeof($data['data']))];
            $data      = array_merge($debugData, $data);
        }

        return response($data, $data['status_code']);
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondWithSuccess($data)
    {
        return $this->setStatusCode(200)->respond($data, 200);
    }

    /**
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
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

        if (sizeof($updatedData) > 0) {
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

    public function respondInvalidQuery($sql)
    {
        $data = [
            "status"      => "fail",
            "api_request" => $this->requestUri,
            "message"     => $sql
        ];

        return response($data, 403);
    }

    public function isDebug()
    {
        if (isset($this->queryString['debug'])) {
            return $this->queryString['debug'] === 'true';
        }
        return false;
    }

    public function addDebugInfo($num_rows = 0)
    {
        $debug = [
            'api_token' => $this->token,
            'db_source' => env('DB_CONNECTION'),
            'db_name'   => (env('DB_CONNECTION') === 'sqlite') ? env('DB_NAME'): env('DB_DATABASE'),
            'num_rows'  => $num_rows
        ];

        if ($this->token === 'c3be77b4-c9f1-3109-8729-e6704c93ef41') {
            $debug['trial'] = "Trial access limited to {$this->limit} rows";
        }
        
        return $debug;
    }
}
