<?php

namespace App\Http\Controllers\API;

use App\Models\Batting;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class BattingController extends ApiController
{
    protected $endpoint;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->endpoint = 'batting'; // override if user entered `batters`
    }

    public function store(Request $request)
    {
        $model = new Batting();
        $v = $model->validate($request->all());
        if ($v->passes()) {
            $response = $this->api->post($request);
            return response($response, $response['status_code']);
        } else {
            $response = [
                "status_code" => 422,
                "message"     => "Validation Failed",
                "errors"      => $v->errors(),
            ];
            return response($response, 422);
        }
    }
}
