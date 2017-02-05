<?php

namespace App\Http\Middleware;

use Closure;

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
		$requestMethod = ($request->server('REQUEST_METHOD'));
		// should this still be locked down for `GET`

		$token = $request->header('API-Token')
			? $request->header('API-Token')
			: array_get($request->query(),'token');

		if($token !== 'mkjbbtrsh10') {
			return response(['error' => 401, 'message' => 'Invalid API Token','token' => $token], 401);
		}
        return $next($request);
    }
}
