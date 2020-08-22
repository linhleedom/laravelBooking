<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Hash;

class RegisterUserController extends Controller
{
    public function postRegister(Request $request){
        $validatorReg = Validator::make($request->all(), 
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required|numeric|unique:users,phone',
                'password'=>'required|min:8|max:20',
                'confirm_password'=>'required|same:password'
            ],[
                'name.required'=>'Vui lòng nhập tên',
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không hợp lệ',
                'email.unique'=>'Email đã có người sử dụng',
                'phone.numeric'=>'Số điện thoại không đúng định dạng',
                'phone.unique'=>'Số điện thoại đã có người sử dụng',
                'password.required'=>'Vui lòng nhập password',
                'password.min'=>'Mật khẩu phải dài hơn 8 kí tự',
                'password.max'=>'Mật khẩu dài không quá 20 kí tự',
                'confirm_password.same'=>'Mật khẩu xác nhận không đúng'
            ]
        );

        if ($validatorReg->fails()) {
            return redirect()->back()->withErrors($validatorReg, 'register');
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar = 'uploads/avatar/avatar.jpg';
        $user->phone = $request->phone;
        $user->permision = '2';
        $user->save();
        return redirect()->back()->with(['feedback'=>'register_success','massage'=>'Đăng ký thành công xin mời đăng nhập']);
    }
}
