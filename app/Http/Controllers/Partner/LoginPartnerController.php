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
        $validatorLogin = Validator::make($request->all(), 
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],[
                'email.required'=>'Không để trống email',
                'email.email'=>'Email không hợp lệ',
                'password.min'=>'Mật khẩu phải dài hơn 8 kí tự',
                'password.max'=>'Mật khẩu dài không quá 20 kí tự'
            ]
        );
        if ($validatorLogin->fails()) {
            return redirect()->back()->withErrors($validatorLogin, 'login');
        }

        $remember = $request->has('remember') ? true : false;
        $data = array('email'=>$request->email,'password'=>$request->password);

        if(Auth::attempt($data) ){
            if( Auth::user()->permision != 1 ){
                Auth::logout();
                return redirect()->back()->with(['errors-register'=>'fail','massage'=>'Email hoặc mật khẩu không đúng, vui lòng thử lại']);
            }else{
                return redirect()->intended('partner/trangchu')->with(['success-login'=>'register_success','massage'=>'Đăng nhập thành công']);
            }
        }else{
            return redirect()->back()->with(['errors-register'=>'fail','massage'=>'Email hoặc mật khẩu không đúng, vui lòng thử lại']);
        }
    }

    public function getDangKyPartner(){
        
        return view ('partner.login.register');
    }

    public function postDangKyPartner(Request $request){
        
            $validatorReg = Validator::make($request->all(), 
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required|numeric|unique:users,phone',
                'password'=>'required|min:6|max:20'
            ],[
                'name.required'=>'Bạn chưa nhập tên',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Email không hợp lệ',
                'email.unique'=>'Email đã có người sử dụng',
                'phone.numeric'=>'Số điện thoại không đúng định dạng',
                'phone.unique'=>'Số điện thoại đã có người sử dụng',
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Mật khẩu phải dài hơn 6 kí tự',
                'password.max'=>'Mật khẩu dài không quá 20 kí tự'
            ]
        );

        if ($validatorReg->fails()) {
            return redirect()->back()->withErrors($validatorReg, 'register');
        }
        $user = new User();
        $user->email =$request->email;
        $user->name =$request->name;
        $user->permision= "1";
        $user->password =bcrypt($request->password);
        $user->phone =$request->phone;
        $user->save();
        return redirect()->intended('partner/login-partner')->with(['errors-register'=>'register_success','massage'=>' Bạn đã đăng ký thành công ']);
    }
}
