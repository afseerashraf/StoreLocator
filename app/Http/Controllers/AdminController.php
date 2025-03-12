<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\AdminRegister;
use App\Http\Requests\admin\adminLogin; 
use Illuminate\Support\Facades\Crypt;


class AdminController extends Controller
{
    public function register(AdminRegister $request)
    {
        $admin = new Admin();
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        if($request->hasfile('image')){
            
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
           
            Storage::disk('public')->putFileAs('uploads/admin/images', $request->image, $fileName);
           
            $input['image'] = $fileName;
        }

        $admin->create($input);

        return redirect()->route('admin.viewLogin');

    }

    public function login(adminLogin $request){
       
        $credentials = ['email' => $request->email, 'password' => $request->password];
        
        if(auth()->guard('admin')->attempt($credentials)){
           
            $admin = auth()->guard('admin')->user();

            Session(['admin' => $admin]);
            
           return view('admin.profile', compact('admin'));
                
        }else{
            
            return redirect()->route('admin.viewLogin');
        }
    }

    public function logout(String $id){
        $admin = Admin::find(Crypt::decrypt($id));
        $admin->logut();
    }
}
