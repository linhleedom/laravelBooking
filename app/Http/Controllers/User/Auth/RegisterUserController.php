<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function postRegister(Request $request){
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required|email|unique:user,email',
                'phone'=>'required|unique:user,phone',
                'password'=>'required|min:8|max:20',
                'confirm_password'=>'required|same:password'
            ],[
                'email.required'=>'Không để trống email',
                'email.email'=>'Email không hợp lệ',
                'password.min'=>'Mật khẩu phải dài hơn 8 kí tự',
                'password.max'=>'Mật khẩu dài không quá 20 kí tự'
            ]
        );
    }
}
