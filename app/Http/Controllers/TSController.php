<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Slide;
class TSController extends Controller
{
    public function getTS(){
        $slide= Slide::all();
    	return view('admin.themslide',['$slide'=>$slide]);
    }
    public function postTS(Request $request)
    {
        $this->validate($request,
            [
                'slogan'=>'required|unique:slides,slogan|min:3|max:100',
                'url'=>'required',
                'status'=>'required',
            ],
            [
                'slogan.required'=>'Bạn chưa nhập slogan!',
                'slogan.unique'=>'Slogan đã tồn tại',
                'slogan.min'=>'Độ dài tối thiểu là 3 kí tự',
                'slogan.max'=>'Độ dài tối đa là 100 kí tự',
                'url.required'=>'Bạn hãy chọn ảnh nhé!',
                'status.required'=>'Chọn trạng thái!',
            ]);
        
    	
    	$slide=new Slide;
    	$slide->slogan= $request->slogan;
    	$slide->status= $request->status;
    	$slide ->created_at= now();
        $slide ->updated_at= now();
        $file_name= $request->file('url')->getClientOriginalName();
        $duoi=$request->file('url')->getClientOriginalExtension();
        if ($duoi!='jpg'&&$duoi!='jpeg' && $duoi!='png' && $duoi!='jfif') {
             return redirect('admin/themslide')->with('loi','File thêm phải có định dạng jpg || jpeg || png || jfif!');
        }
        $hinh= Str::random(5).$file_name;
        $link='uploads/slider/'.$hinh;
        $slide->url= $link;
        $request->file('url')->move('public/uploads/slider',$hinh);
    	$slide->save();
        return redirect('admin/themslide')->with('thongbao','Thêm slide thành công !');


        
    }
}

