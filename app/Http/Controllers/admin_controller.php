<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;

class admin_controller extends Controller
{
    public function login(){
        $page_title = "Login";

        return view('dashboard.login',compact('page_title'));
    }

    public function login_check(loginRequest $request){

        $auth = auth()->guard("admin")->attempt([
                                'username'=>$request->input('username'),
                                'password'=>$request->input('password')
                                ]);

        if ($auth) {
            return redirect()->route('dashboard')->with(['success' => 'Logged in successfully']);
        }else{
            return redirect()->back()->with(['error' => 'username or password is incorrect']);
        }

    }
    public function logout(){
        auth()->guard("admin")->logout();
        return redirect(Route("admin_login"));
    }
    public function show_dashboard(){
        $page_title = "Dashboard";
        return view('dashboard.index',compact('page_title'));
    }
}
