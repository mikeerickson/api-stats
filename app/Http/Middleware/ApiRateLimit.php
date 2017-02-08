<?php

namespace App\Http\Middleware;

use App\Models\APIToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\DB;

class ApiRateLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//		$requestMethod = ($request->server('REQUEST_METHOD'));
//		if($requestMethod === 'GET') {
//			return $next($request);
//		}

		$token = $request->header('API-Token')
			? $request->header('API-Token')
			: array_get($request->query(),'token');

		$result = DB::table('api_tokens')->where('token','=', $token)->get();
		if(sizeof($result) === 0) {
			return response([
				"error"   => 401,
				"message" => "Invalid Token",
				"token"   => $token
			], 401);
		}

		if($result[0]->active) {
			if($result[0]->expires < Carbon::now()) {
				return response([
					"error"   => 401,
					"message" => "Token Expired","token" => $token
				], 401);
			}
		} else {
			return response([
				"error"   => 401,
				"message" => "Account Disabled (token `$token` expired)"
			], 401);
		}
        return $next($request);
    }
}
