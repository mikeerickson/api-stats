<?php

namespace App\Http\Middleware;

use Closure;

class ApiVerifyEndpoint
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
    	$supportedEndpoints = [
    		'appearances',
			'batting',
			'fielding',
			'managers',
			'players',
			'parks',
			'pitching',
			'teams',
			'teamsfranchises'
		];
    	$parts = explode("/", $request->getPathInfo());

    	if(!in_array('api',$parts)) {
    		return $next($request);
		} else {
			if(sizeof($parts) > 3) {
				$endpoint = $parts[3];
				if(!in_array($endpoint, $supportedEndpoints)) {
					return response([
						'error' => 501,
						'message' => 'Unsupported Endpoint',
						'requestedEndpoint' => $endpoint
					], 501);
				}
			} else {
				return response([
					'error' => 501,
					'message' => 'API Access Requires Endpoint'
				], 501);
			}

			return $next($request);
		}
    }
}
