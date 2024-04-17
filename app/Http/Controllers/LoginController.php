<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function loginAction(request $request){
        $validate=$request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($validate)){
            return redirect('/dashboard')->with('success','Login Berhasil');
        }
        return back()->with('error','email atau Password Salah');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','Logout Success');
    }
}
