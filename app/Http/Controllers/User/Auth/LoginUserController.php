<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:8|max:20',
            ],[
                'email.required'=>'Không để trống email',
                'email.email'=>'Email không hợp lệ',
                'password.min'=>'Mật khẩu phải dài hơn 8 kí tự',
                'password.max'=>'Mật khẩu dài không quá 20 kí tự'
            ]
        );
        $remember_me = $request->has('remember_me') ? true : false;
        $data = array('email'=>$request->email,'password'=>$request->password);
        // dd($remember_me);
        if(Auth::attempt($data,$remember_me) ){
            return redirect()->back()->with(['feedback'=>'success','massage'=>'Đăng nhập thành công']);
        }else{
            return redirect()->back()->with(['feedback'=>'fail','massage'=>'Email hoặc mật khẩu không đúng, vui lòng thử lại']);
        }
        
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }
}