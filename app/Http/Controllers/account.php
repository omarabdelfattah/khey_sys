<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;

class account extends Controller
{
    
    public function login(){
        $page_title = "Login";
        return view('front.login',compact('page_title'));
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
