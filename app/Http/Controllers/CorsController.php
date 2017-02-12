<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorsController extends Controller
{
    function index()
	{
		return [
			"fname" => "mike",
			"spouse" => "kira"
		];
	}
}
