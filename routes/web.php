<?php

use App\User;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// ================================================================================================================
// API MIDDLEWARE

$middleware = [
	'api.logger',
	'api.rateLimit',
	'api'
];

// curl -H "Origin: http://example.com" --verbose http://localhost:8000/api
Route::group(['middleware' => 'api'], function(Router $router){
	$router->get('cors-test', 'CorsController@index');
});

// ================================================================================================================
// APPLICATION ROUTES

Route::get('/', function () {
	return view('home');
})->name('index');

Route::get('home', function() {
	return view('home');
});

Route::get('about', function () {
	return view('about');
})->name('about');

Route::get('contact', function () {
	return view('contact');
})->name('contact');

Route::get('resource', function () {
	if(Auth::check()) {
		return view('resource')
			->with('endpoint', getEndpoint($_SERVER['QUERY_STRING']));
	} else {
		flash('Please login and try again.  If you don\'t have an account, please <a href="register">register</a> to gain full access');
		return redirect('login');
	}

});

// ================================================================================================================
// AUTHENTICATION (login, logout)

Route::get('login', function () {
	return view('login');
})->name('login');

Route::post('login', function(Request $request) {

	$email    = $request->input("email");
	$password = $request->input("password");

	if (Auth::attempt(["email" => $email, "password" => $password], true, true)) {
		return redirect("home");
	} else {
		flash("Invalid E-Mail or Password, please try again.","danger");
		return redirect('login')->withInput($request->input());
	}
});

Route::get('logout', function () {
	Auth::logout();
	return redirect('home');
})->name('logout');

// ================================================================================================================
// REGISTER (register)

Route::get('register', function () {
	return view('register');
})->name('register');

Route::post('register', function (Request $request) {
	$data = $request->input();

	if($data['password'] === $data['passwordconfirm']) {
		try {
			$newData = $data;
			unset($newData['passwordconfirm']);
			$newData['password'] = bcrypt($newData['password']);
			$result = User::create($newData);
		} catch(Exception $e) {
			flash($e->errorInfo[2],'danger');
			return redirect('register');
		}
		if($result) {
			Auth::attempt(["email" => $data['email'], "password" => $data['password']], true, true);
			return redirect('home');
		}
	}
	flash('Passwords Must Match', 'danger');
	return redirect('register');
});


// ================================================================================================================
// API ROUTES
// ================================================================================================================

Route::group(['prefix' => 'api/v1', 'middleware' => $middleware], function () {

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
	Route::resource('salaries','API\ApiController');
	Route::resource('teamsfranchises','API\ApiController');

});

// ================================================================================================================
// ROUTE HELPERS
// ================================================================================================================

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
	return str_replace("/","",$endpoint);
}

function isEndpoint($testEndpoint)
{
	if(gettype($testEndpoint) === 'array') {
		foreach ($testEndpoint as &$value) {
			if(strtolower(endpoint()) === strtolower($value)) {
				return true;
			}
		}
		return false;
	} else {
		return (strtolower(endpoint()) === strtolower($testEndpoint));
	}
}

function getEndpoint($qs)
{
	return getQueryStringParam($qs, 'endpoint');
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
	$result = array();
	$parts  = explode($argSeparator, $queryString);

	foreach ($parts as $part) {
		list($paramName, $paramValue)   = explode('=', $part, 2);

		switch ($decType) {
			case PHP_QUERY_RFC3986:
				$paramName  = rawurldecode($paramName);
				$paramValue = rawurldecode($paramValue);
				break;

			case PHP_QUERY_RFC1738:
			default:
				$paramName  = urldecode($paramName);
				$paramValue = urldecode($paramValue);
				break;
		}


		if (preg_match_all('/\[([^\]]*)\]/m', $paramName, $matches)) {
			$paramName = substr($paramName, 0, strpos($paramName, '['));
			$keys      = array_merge(array($paramName), $matches[1]);
		} else {
			$keys      = array($paramName);
		}

		$target = &$result;

		foreach ($keys as $index) {
			if ($index === '') {
				if (isset($target)) {
					if (is_array($target)) {
						$intKeys = array_filter(array_keys($target), 'is_int');
						$index   = count($intKeys) ? max($intKeys)+1 : 0;
					} else {
						$target = array($target);
						$index  = 1;
					}
				} else {
					$target = array();
					$index  = 0;
				}
			} elseif (isset($target[$index]) && !is_array($target[$index])) {
				$target[$index] = array($target[$index]);
			}

			$target = &$target[$index];
		}

		if (is_array($target)) {
			$target[] = $paramValue;
		} else {
			$target   = $paramValue;
		}
	}

	return $result;
}
