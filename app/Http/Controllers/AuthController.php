<?php

use Illuminate\Http\Request;

class AuthController extends Controller {
	protected $request;

	function __construct(Request $request)
	{
		$this->request = $request;
	}
}
