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

$middleware = [
	'api.logger',
	'api.rateLimit'
];


Route::group(['prefix' => 'api/v1', 'middleware' => $middleware], function ($route) {

	Route::resource('appearances','ApiController');
	Route::resource('batting','ApiController');
	Route::resource('fielding','ApiController');
	Route::resource('players','ApiController');
	Route::resource('pitching','ApiController');
	Route::resource('managers','ApiController');
	Route::resource('parks','ApiController');
	Route::resource('teams','ApiController');
	Route::resource('teamsfranchises','ApiController');

});

Route::get('/', function () {
    return view('welcome');
});


