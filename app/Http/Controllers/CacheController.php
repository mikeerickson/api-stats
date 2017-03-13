<?php

namespace App\Http\Controllers;

use App\Cache;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    public function index()
    {
        $data = Cache::all();
        return view('cache', ['data' => $data]);
    }
}
