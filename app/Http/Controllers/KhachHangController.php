<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
class KhachHangController extends Controller
{
    public function getDanhSach()
    {
        $user= User::all();
    	return view('admin.khachhang.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
        $user= User::all();
        return view('admin.khachhang.them',['user'=>$user]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'avatar'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:30',
            'passwordagain'=>'required|same:password'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên quá ngắn',
            'avatar.required'=>'Chọn Avatar đuê!',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập PassWord',
            'password.min'=>'PassWord có 8->30 kí tự',
            'password.max'=>'PassWord có 8->30 kí tự',
            'passwordagain.required'=>'Bạn chưa nhập lại pass',
            'passwordagain.same'=>'Pass nhập lại không đúng'
        ]);
        
        $user=new User;
        $user->name= $request->name;
        $user->password= bcrypt($request->password);
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->permision= $request->permision;
        $file_name= $request->file('avatar')->getClientOriginalName();
        $duoi=$request->file('avatar')->getClientOriginalExtension();
        if ($duoi!='jpg'&& $duoi!='jpeg'&& $duoi!='png'&& $duoi!='jfif') {
             return redirect('admin/khachhang/them')->with('loi','Bạn hãy chọn định dạng file ảnh jpg || jpeg || png || jfif');
        }
        $hinh=Str::random(5).'_'.$file_name;
        $link='uploads/avatar/'.$hinh;
        $user->avatar= $link;
        $request->file('avatar')->move('public/uploads/avatar',$hinh);
        $user->save();
        return redirect('admin/khachhang/them')->with('thongbao','Bạn đã thêm thành công');


       

    }

    public function getEdit($id){
        $user=User::find($id);
        return view('admin/khachhang/edit',['user'=>$user]);
    }
    public function postEdit(Request $request,$id){
         $this->validate($request,[
            'name'=>'required|min:3', 
             
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên quá ngắn',
           
        ]);
        $user=User::find($id);
        $user->name= $request->name;
        $user->phone= $request->phone;
        $user->permision= $request->permision;
        if ($request->hasFile('avatar')) {
            $file_name= $request->file('avatar')->getClientOriginalName();
            $duoi=$request->file('avatar')->getClientOriginalExtension();
            if ($duoi!='jpg'&& $duoi!='jpeg'&& $duoi!='png'&& $duoi!='jfif') {
                 return redirect('admin/khachhang/edit/'.$id)->with('loi','Bạn hãy chọn định dạng file ảnh jpg || jpeg || png || jfif');
            }
            $hinh=Str::random(5).'_'.$file_name;
            $link='uploads/avatar/'.$hinh;
           
                unlink("public/".$user->avatar);
           
            $user->avatar= $link;
            $request->file('avatar')->move('public/uploads/avatar',$hinh);
     }
        if($request->changepass=="on")
        {
             $this->validate($request,[
            'password'=>'required|min:5|max:30',
            'passwordagain'=>'required|same:password'
        ],
        [
            'password.required'=>'Bạn chưa nhập PassWord',
            'password.min'=>'PassWord có 5->30 kí tự',
            'password.max'=>'PassWord có 5->30 kí tự',
            'passwordagain.required'=>'Bạn chưa nhập lại pass',
            'passwordagain.same'=>'Pass nhập lại không đúng'
        ]);
             $user->password= bcrypt($request->password);
        }
        $user->save();
         return redirect('admin/khachhang/edit/'.$id)->with('thongbao','Bạn dẫ sửa thành công');
    }

    public function getDetail($id)
    {
        $user=User::find($id);
        return view('admin/khachhang/detail',['user'=>$user]);
    }

    public function getDelete($id){
        $user=User::find($id);
        $user->delete();
        return redirect('admin/khachhang/danhsach')->with('thongbao','Xóa thành công');
    }

   
    public function getLogin(){
        return view('admin.login.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập password',
        ]
        );
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/dashboard');
        }else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại');
        }
    }
    public function getLogout()
    {  
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
