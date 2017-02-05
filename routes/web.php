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

use Illuminate\Support\Facades\Request;

use App\Http\Controllers\API\ApiController;

//\Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//	echo'<pre>';
//	var_dump($query->sql);
//	echo'</pre>';
//});

$middleware = [
	'api.logger',
	'api.rateLimit'
];

Route::get('/', function () {
	return view('welcome');
});

//Route::get('build', function (Request $request) {
//	$table = 'batting';
//	$queryString = Request::input('q');
//	$query = buildQuery('batting', $queryString);
//	return response($query, 200);
//});

Route::group(['prefix' => 'api/v1', 'middleware' => $middleware], function ($route) {

	Route::resource('appearances','API\ApiController');
	Route::resource('batting','API\BattingController');
	Route::resource('fielding','API\ApiController');
	Route::resource('players','API\ApiController');
	Route::resource('pitching','API\ApiController');
	Route::resource('managers','API\ApiController');
	Route::resource('parks','API\ApiController');
	Route::resource('teams','API\ApiController');
	Route::resource('teamsfranchises','API\ApiController');

});
