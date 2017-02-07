<?php

namespace App\Http\Controllers\API;

use App\Models\Batting;
use Illuminate\Http\Request;

class PitchingController extends ApiController
{
	protected $endpoint;

	function __construct(Request $request)
	{
		parent::__construct($request);
		$this->endpoint = 'pitching'; // override if user entered `pitchers`
	}


}
