<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // admin login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        try {
            $admin = Admin::where('email','=',$request->email)->first();
            if($admin) {
                if(Hash::check($request->password,$admin->password)){
                    session()->put('admin',$admin->id);
                    return redirect()->route('admin.dashboard');
                }else{
                    session()->flash('type','danger');
                    session()->flash('message','The email or password does not match');
                    return redirect()->back();
                }
            } else {
                session()->flash('type','danger');
                session()->flash('message','Credential do not match our record');
                return redirect()->back();
            }
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // admin logout
    public function logout(){
        if(session()->has('admin')){
            session()->pull('admin');
            return redirect('/');
        }
    }
}
