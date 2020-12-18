<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin_controller extends Controller
{
    public function login(){
        $page_title = "Login";

        return view('dashboard.login',compact('page_title'));
    }

    public function login_check(loginRequest $request){

        $auth = auth()->attempt([
                                'username'=>$request->input('username'),
                                'password'=>$request->input('password')
                                ]);
        if ($auth) {
            return redirect()->route('form')->with(['success' => 'Logged in successfully']);
        }else{
            return redirect()->back()->with(['error' => 'username or password is incorrect']);
        }
    }
    public function logout(){
        auth()->logout();
        return redirect(Route("login"));
    }
}
