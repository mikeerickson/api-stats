<?php

use Illuminate\Http\Request;

class RegisterController extends Controller {
	protected $request;

	function __construct(Request $request)
	{
		$this->request = $request;
	}
}
