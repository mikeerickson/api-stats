<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\API\ApiController;

$middleware = [
	'api.logger',
	'api.rateLimit',
	'api'
];

// curl -H "Origin: http://example.com" --verbose http://localhost:8000/api
Route::group(['middleware' => 'api'], function(Router $router){
	$router->get('cors-test', 'CorsController@index');
});



Route::get('/', function () {
	$data = [
		"qs" => "token=c3be77b4-c9f1-3109-8729-e6704c93ef41&debug=true"
	];
	return view('home')->with('data', $data);
});

Route::get('about', function () {
	$data = [
		"qs" => "token=c3be77b4-c9f1-3109-8729-e6704c93ef41&debug=true"
	];
	return view('about')->with('data', $data);
});

Route::get('contact', function () {
	$data = [
		"qs" => "token=c3be77b4-c9f1-3109-8729-e6704c93ef41&debug=true"
	];
	return view('contact')->with('data', $data);
});

Route::get('resource', function () {

	$data = [
		"qs" => "token=c3be77b4-c9f1-3109-8729-e6704c93ef41&debug=true"
	];
	return view('resource')
		->with('data', $data)
		->with('endpoint', getEndpoint($_SERVER['QUERY_STRING']));
});

Route::get('login', function () {
	return response('login');
});



Route::group(['prefix' => 'api/v1', 'middleware' => $middleware], function ($route) {

	Route::resource('appearances','API\ApiController');
	Route::resource('batting','API\BattingController');
	Route::resource('batters','API\BattingController');
	Route::resource('fielding','API\ApiController');
	Route::resource('players','API\ApiController');
	Route::resource('pitching','API\PitchingController');
	Route::resource('pitchers','API\PitchingController');
	Route::resource('managers','API\ApiController');
	Route::resource('parks','API\ApiController');
	Route::resource('teams','API\ApiController');
	Route::resource('teamsfranchises','API\ApiController');

});


function endpoint()
{
	$endpoint = $_SERVER['REQUEST_URI'];
	if($endpoint === '/') {
		$endpoint = "Home";
	}
	$pos = strpos($endpoint, "?");

	if($pos !== false) {
		 $endpoint = substr($endpoint, 0, $pos);
	}
	if(strpos($endpoint, 'resource') !== false) {
		$endpoint = "Endpoints";
	}
	return ucwords(str_replace("/","",$endpoint));
}

function isEndpoint($testEndpoint)
{
	return (strtolower(endpoint()) === strtolower($testEndpoint));
}

function getEndpoint($qs)
{
	return ucwords(getQueryStringParam($qs, 'endpoint'));
}

function getQueryStringParam($qs, $key)
{
	$parts = http_parse_query($qs);
	return $parts[$key];
}

/**
 * Parses http query string into an array
 *
 * @author Alxcube <alxcube@gmail.com>
 *
 * @param string $queryString String to parse
 * @param string $argSeparator Query arguments separator
 * @param integer $decType Decoding type
 * @return array
 */
function http_parse_query($queryString, $argSeparator = '&', $decType = PHP_QUERY_RFC1738) {
	$result             = array();
	$parts              = explode($argSeparator, $queryString);

	foreach ($parts as $part) {
		list($paramName, $paramValue)   = explode('=', $part, 2);

		switch ($decType) {
			case PHP_QUERY_RFC3986:
				$paramName      = rawurldecode($paramName);
				$paramValue     = rawurldecode($paramValue);
				break;

			case PHP_QUERY_RFC1738:
			default:
				$paramName      = urldecode($paramName);
				$paramValue     = urldecode($paramValue);
				break;
		}


		if (preg_match_all('/\[([^\]]*)\]/m', $paramName, $matches)) {
			$paramName      = substr($paramName, 0, strpos($paramName, '['));
			$keys           = array_merge(array($paramName), $matches[1]);
		} else {
			$keys           = array($paramName);
		}

		$target         = &$result;

		foreach ($keys as $index) {
			if ($index === '') {
				if (isset($target)) {
					if (is_array($target)) {
						$intKeys        = array_filter(array_keys($target), 'is_int');
						$index  = count($intKeys) ? max($intKeys)+1 : 0;
					} else {
						$target = array($target);
						$index  = 1;
					}
				} else {
					$target         = array();
					$index          = 0;
				}
			} elseif (isset($target[$index]) && !is_array($target[$index])) {
				$target[$index] = array($target[$index]);
			}

			$target         = &$target[$index];
		}

		if (is_array($target)) {
			$target[]   = $paramValue;
		} else {
			$target     = $paramValue;
		}
	}

	return $result;
}
