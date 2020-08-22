<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;


class LoginPartnerController extends Controller
{
    
    public function getDangNhapPartner()
    {
        return view ('partner.login.login');
    }
    public function postDangNhapPartner(Request $request)
    {
        $arrcheck = ['email' => $request->email,'password' => $request->password];
        if($request->remember = 'Remember Me'){
            $remember =true;
        }else 
        {
            $remember =false;
        }
        if(Auth::attempt($arrcheck))
        {
            return redirect()->intended('partner/trangchu');
        }else 
        {
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu k đúng');
        }
    }

    public function getDangKyPartner(){
        
        return view ('partner.login.register');
    }

    public function postDangKyPartner(Request $request){
        
        $rules =
        [
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3',
            'phone' => 'required|unique:users,phone|min:10',

        ];
        $messages =
        [
            'email.required' => 'Bạn chưa nhập email ',
            'email.email' => 'Bạn chưa nhập đúng định dạng ',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Bạn chưa nhập tên ',
            'name.min' => 'Tên người dùng có ít nhất 3 kí tự',
            'phone.required' => 'Bạn chưa nhập phone ',
            'phone.max' => 'Bạn chưa nhập đúng số điện thoại ',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu '
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        
        $user = new User();
            $user->email =$request->email;
            $user->name =$request->name;
            $user->permision= "1";
            $user->password =bcrypt($request->password);
            $user->phone =$request->phone;
            $user->save();

        if ($user->id ){
            
            return redirect()->intended('login-partner')->with('thongbao','Đăng ký thành công');

        }else
        {
            return redirect()->back()->withErrors($validator);
        }
    }
}
