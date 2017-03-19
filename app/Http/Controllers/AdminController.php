<?php

namespace App\Http\Controllers;

use App\Models\Cache;
use App\Models\APIToken;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function cache()
    {
        return view('admin.cache', ['data' => Cache::all()]);
    }

    public function cache_delete($key)
    {
        $ret = Cache::where('key', '=', $key)->delete();
        if ($ret === 1) {
            $data = [
                "status"      => "success",
                'message'     => "Record deleted successfully."
            ];
        } else {
            $data = [
                "status"      => "fail",
                'message'     => "An error occurred deleting `Cache` value."
            ];
        }

        return response($data, $ret === 1 ? 200 : 422);
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
            'id'       => $user['id'],
            'name'     => $user['name'],
            'email'    => $user['email'],
            'token'    => $user_token['token'],
            'expires'  => Carbon::createFromFormat('Y-m-d H:i:s', $user_token['expires'])->format('Y-m-d h:i A')
        ];

        return view('admin.account', ['data' => $data]);
    }

    public function account_update()
    {
        $data         = $this->request->all();
        $id           = $data['id'];
        $originalMail = User::find($id)['email'];

        $updateData = [
            'user'  => $data['name'],
            'email' => $data['email']
        ];

        if ($originalMail !== $data['email']) {
            APIToken::where('email', '=', $originalMail)
                ->update([
                    'email' => $updateData['email']
                ]);
        }

        User::find($id)
            ->update($updateData);

        flash("Account Updated Successfully.", "success");
        
        return redirect('/account');
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

    public function getStatus($date)
    {
        return 'warning';
    }
}
