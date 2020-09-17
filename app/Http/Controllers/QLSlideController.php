<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Slide;
class QLSlideController extends Controller
{
    public function getDanhSach(){
    	$slide = Slide::all();
    	return view('admin.QLSlide.danhsach',['slide'=>$slide]);
    }
    public function getEdit($id){
    	$slide = Slide::find($id);
    	return view('admin.QLSlide.edit',['slide'=>$slide]);
    }
    public function postEdit(Request $request, $id)
    {
           $this->validate($request,
            [
                'slogan'=>'required|min:3|max:100',
               
                
            ],
            [
                'slogan.required'=>'Bạn chưa nhập slogan!',
                'slogan.min'=>'Độ dài tối thiểu là 3 kí tự',
                'slogan.max'=>'Độ dài tối đa là 100 kí tự',
               
                
            ]);
    	    $new = Slide::find($id);
            $new->slogan= $request->slogan;
	    	$new->status= $request->status;
	    	$new->updated_at=now();
            if ($request->hasFile('url')) {
                $file_name= $request->file('url')->getClientOriginalName();
                $duoi=$request->file('url')->getClientOriginalExtension();
                if ($duoi!='jpg'&&$duoi!='jpeg' && $duoi!='png' && $duoi!='jfif') {
                     return redirect('admin/QLSlide/edit/'.$id)->with('loi','File thêm phải có định dạng jpg || jpeg || png || jfif!');
                }
                $hinh= Str::random(5).$file_name;
                $link='uploads/slider/'.$hinh;
                unlink("public/".$new->url);
                $new->url= $link;
                $request->file('url')->move('public/uploads/slider',$hinh);
            }
    	    $new->save();
    	    return redirect('admin/QLSlide/edit/'.$id)->with('thongbao','Sửa slide thành công !');
        }
        public function getDel($id){
            $slide=Slide::find($id);
            $slide->delete();
        return redirect('admin/QLSlide/danhsach');
    }
}
