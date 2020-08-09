<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
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
            return redirect()->intended('trangchu');
        }else 
        {
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu k đúng');
        }
    }

    public function getDangKyPartner(){
        
        return view ('partner.login.register');
    }

    public function postDangKyPartner(Request $request){
        
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3',
            'phone' => 'required|max:10',

        ],[
            'name.required' => 'Bạn chưa nhập tên ',
            'name.min' => 'Tên người dùng có ít nhất 3 kí tự',
            'email.required' => 'Bạn chưa nhập email ',
            'email.email' => 'Bạn chưa nhập đúng định dạng ',
            'email.unique' => 'Email đã tồn tại',
            'phone.max' => 'Bạn chưa nhập đúng số điện thoại ',
            'password.required' => 'Bạn chưa nhập mật khẩu '
        ]);
        
        $user = new User();
        if ($user->id){
        $user->email =$request->email;
        $user->name =$request->name;
        $user->permision= "1";
        $user->password =bcrypt($request->password);
        $user->phone =$request->phone;
        $user->save();

        return redirect()->intended('login-partner')->with('error','Đăng ký thành công');

        }else
        {
            
            return back()->withInput()->with('error','Đăng ký không thành công');
        }
    }
}
