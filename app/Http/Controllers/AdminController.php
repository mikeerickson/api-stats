<?php

namespace App\Http\Controllers;

use App\Cache;
use App\Models\APIToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;

class AdminController extends Controller
{
    public function cache()
    {
        return view('admin.cache', ['data' => Cache::all()]);
    }

    public function stats()
    {
        return view('admin.stats');
    }

    public function account()
    {
        $user       = Auth::user();
        $user_token = APIToken::where('email', $user['email'])->first();

        $data = [
            'username' => $user['name'],
            'email'    => $user['email'],
            'token'    => $user_token['token'],
            'expires'  => Carbon::createFromFormat('Y-m-d H:i:s', $user_token['expires'])->format('Y-m-d h:i:s A')
        ];

        return view('admin.account', ['data' => $data]);
    }

    public function getToken($email)
    {
        $data = APIToken::where('email', $email)->first();
        return $data;
    }

    public function resetToken($email)
    {
        $faker = Faker::create();
        $id = APIToken::where('email', $email)->update([
            'token'   => $faker->uuid(),
            'expires' => Carbon::now()->addWeeks(52)
        ]);
        $data = APIToken::find($id);
        return $data;
    }
}
