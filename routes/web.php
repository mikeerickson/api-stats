<?php

use App\Cache;
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
Route::group(['middleware' => 'api'], function (Router $router) {
    $router->get('cors-test', 'CorsController@index');
});

// ================================================================================================================
// APPLICATION ROUTES

Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('home', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::post('contact', 'ContactController@store');

Route::get('contacts', 'ContactController@index');

Route::get('resource', function () {
    if (Auth::check()) {
        return view('resource')
            ->with('endpoint', getEndpoint($_SERVER['QUERY_STRING']));
    } else {
        flash('Please login and try again.  If you don\'t have an account, please <a href="register">register</a> to gain full access');
        return redirect('login');
    }
});

// ================================================================================================================
// ADMIN

Route::group(['middleware' => 'auth'], function () {
    Route::get('stats', 'AdminController@stats');       // phpinfo
    Route::get('cache', 'AdminController@cache');       // cache-viewer
    Route::get('account', 'AdminController@account');   // registered user account information
    Route::get('token/{email}', 'AdminController@getToken');    // get token
    Route::get('resetToken/{email}', 'AdminController@resetToken');    // get token
});

// ================================================================================================================
// AUTHENTICATION (login, logout)

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', function (Request $request) {
    $email    = $request->input("email");
    $password = $request->input("password");

    if (Auth::attempt(["email" => $email, "password" => $password], true, true)) {
        return redirect("home");
    } else {
        flash("Invalid E-Mail or Password, please try again.", "danger");
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

    if ($data['password'] === $data['passwordconfirm']) {
        try {
            $newData = $data;
            unset($newData['passwordconfirm']);
            $newData['password'] = bcrypt($newData['password']);
            $result = User::create($newData);
        } catch (Exception $e) {
            flash($e->errorInfo[2], 'danger');
            return redirect('register');
        }
        if ($result) {
            Auth::attempt(["email" => $data['email'], "password" => $data['password']], true, true);
            return redirect('home');
        }
    }
    flash('Passwords Must Match', 'danger');
    return redirect('register');
});


// ================================================================================================================
// API ROUTES

Route::group(['prefix' => 'api/v1', 'middleware' => $middleware], function () {
    Route::resource('appearances', 'API\ApiController');
    Route::resource('batting', 'API\BattingController');
    Route::resource('batters', 'API\BattingController');
    Route::resource('fielding', 'API\ApiController');
    Route::resource('players', 'API\ApiController');
    Route::resource('pitching', 'API\PitchingController');
    Route::resource('pitchers', 'API\PitchingController');
    Route::resource('managers', 'API\ApiController');
    Route::resource('parks', 'API\ApiController');
    Route::resource('teams', 'API\ApiController');
    Route::resource('salaries', 'API\ApiController');
    Route::resource('teamsfranchises', 'API\ApiController');
});
