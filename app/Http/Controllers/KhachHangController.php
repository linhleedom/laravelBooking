<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
            'password'=>'required|min:6|max:30',
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
            'password.min'=>'PassWord có 6->30 kí tự',
            'password.max'=>'PassWord có 6->30 kí tự',
            'passwordagain.required'=>'Bạn chưa nhập lại pass',
            'passwordagain.same'=>'Pass nhập lại không đúng'
        ]);
        $file_name= $request->file('avatar')->getClientOriginalName();
        $user=new User;
        $user->name= $request->name;
        $link='uploads/avatar/'.$file_name;
        $user->avatar= $link;
        $user->password= bcrypt($request->password);
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->permision= $request->permision;
        $request->file('avatar')->move('public/uploads/avatar',$file_name);
        $user->save();
        return redirect('admin/khachhang/them')->with('thongbao','Bạn dẫ thêm thành công');


        $file_name= $request->file('url')->getClientOriginalName();
        $slide=new Slide;
        $slide->slogan= $request->slogan;
        $link='uploads/slider/'.$file_name;
        $slide->url= $link;
        // $slide->img=$request->img;
        $slide->status= $request->status;
        $slide ->created_at= now();
        $slide ->updated_at= now();
        $request->file('url')->move('public/uploads/slider',$file_name);
        $slide->save();
        return redirect('admin/themslide')->with('thongbao','Thêm slide thành công !');

    }

    public function getEdit($id){
        $user=User::find($id);
        return view('admin/khachhang/edit',['user'=>$user]);
    }
    public function postEdit(Request $request,$id){
         $this->validate($request,[
            'name'=>'required|min:3', 
            'avatar'=>'required',     
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên quá ngắn',
            'avatar.required'=>'Chọn Avatar Đuê!',
        ]);
        $file_name= $request->file('avatar')->getClientOriginalName();
        $user=User::find($id);
        $user->name= $request->name;
        $link='uploads/avatar/'.$file_name;
        $user->avatar= $link;
        $user->phone= $request->phone;
        $user->permision= $request->permision;
        $request->file('avatar')->move('public/uploads/avatar',$file_name);
        if($request->changepass=="on")
        {
             $this->validate($request,[
            'password'=>'required|min:6|max:30',
            'passwordagain'=>'required|same:password'
        ],
        [
            'password.required'=>'Bạn chưa nhập PassWord',
            'password.min'=>'PassWord có 6->30 kí tự',
            'password.max'=>'PassWord có 6->30 kí tự',
            'passwordagain.required'=>'Bạn chưa nhập lại pass',
            'passwordagain.same'=>'Pass nhập lại không đúng'
        ]);
             $user->password= bcrypt($request->password);
        }
        $user->save();
         return redirect('admin/khachhang/edit/'.$id)->with('thongbao','Bạn dẫ sửa thành công');
    }

    public function getDelete($id){
        $user=User::find($id);
        $user->delete();
        return redirect('admin/khachhang/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getDetail()
    {
    	return view('admin.khachhang.detail');
    }
    public function getDetailStay()
    {
    	return view('admin.khachhang.detailstay');
    }
    public function getDSHomeStay()
    {
    	return view('admin.khachhang.dshomestay');
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
