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
	$data = ["qs" => "token=c3be77b4-c9f1-3109-8729-e6704c93ef41&debug=true"];
	return view('home')->with('data', $data);
});

Route::get('about', function () {
	flash('Message', 'success');
	$data = ["qs" => "token=c3be77b4-c9f1-3109-8729-e6704c93ef41&debug=true"];
	return view('about')->with('data', $data);
});

Route::get('contact', function () {
	$data = ["qs" => "token=c3be77b4-c9f1-3109-8729-e6704c93ef41&debug=true"];
	return view('contact')->with('data', $data);
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

