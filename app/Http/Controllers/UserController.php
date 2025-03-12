<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\user\UserRegister;
use App\Http\Requests\user\UserLogin;

class UserController extends Controller
{
    public function register(UserRegister $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        
        return redirect()->route('user.viewLogin');

    }


    public function login(UserLogin $request){
       
        $credentials = ['email' => $request->email, 'password' => $request->password];
        
        if(auth()->guard('web')->attempt($credentials)){
           
            $user = auth()->guard('web')->user();
            Session(['user' => $user]);
           return view('user.home', compact('user'));

        }else{
            
            return redirect()->route('user.viewLogin');
        }
    }
}
