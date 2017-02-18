<?php

namespace App\Http\Controllers\API;

use App\Models\Batting;
use Illuminate\Http\Request;

class BattingController extends ApiController
{
    protected $endpoint;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->endpoint = 'batting'; // override if user entered `batters`
    }
}
