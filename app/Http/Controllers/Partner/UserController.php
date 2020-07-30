<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDangnhapAdmin(){
        return view ('partner.login.login-and-register');
    }

    public function postDangnhapAdmin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:3|max:20'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Password không được nhỏ hơn 3 ký tự',
            'password.max' => 'Password không được lớn hơn 20 ký tự',
        ]);
    }
}
