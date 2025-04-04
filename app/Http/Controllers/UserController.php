<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UserLogin;
use App\Http\Requests\user\UserRegister;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    public function register(UserRegister $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        flash()->success('successfully Registet the user '.$user->name);

        return redirect()->route('user.viewLogin');

    }

    public function login(UserLogin $request)
    {

        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (auth()->guard('web')->attempt($credentials)) {

            $user = auth()->guard('web')->user();

            $ip = request()->ip();

            $location = Location::get($ip);

            if ($location && $location->latitude && $location->longitude) {
                session([
                    'latitude' => $location->latitude,
                    'longitude' => $location->longitude,
                ]);
            }

            $latitude = session('latitude', 10.015674);
            $longitude = session('longitude', 76.341019);

            $stores = Store::selectRaw('*, 
                (6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) 
                * cos( radians( longitude ) - radians(?) ) 
                + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance',
                [$latitude, $longitude, $latitude])
                ->orderBy('distance')
                ->get();

            return view('user.home', compact('user', 'stores'));

        } else {

            return redirect()->route('user.viewLogin')->with('error', 'Invalid credentials');
        }

    }

    public function logout(Request $request)
    {
        auth::logout();

        return redirect()->route('user.viewLogin');
    }
}
