<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
class LoginController extends Controller
{
    public function getLogin(){
        return view ('partner.login.login-and-register');
    }

    public function postLogin(Request $request){
        
        $arr = ['email' => $request->email, 'password' => $request->password];
        if($request->remember = 'Remember Me'){
            $remember = true;
        }else {
            $remember = false;
        }
        if(Auth::attempt($arr)){
            return redirect()->intended('index');
        }else {
            return back ()->withInput() ->with('error','Tài khoản or mật khẩu không đúng');
        }
    }
    
}
