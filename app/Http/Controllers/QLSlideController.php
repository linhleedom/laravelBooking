<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                'url'=>'required',
                
            ],
            [
                'slogan.required'=>'Bạn chưa nhập slogan!',
                'slogan.min'=>'Độ dài tối thiểu là 3 kí tự',
                'slogan.max'=>'Độ dài tối đa là 100 kí tự',
                'url.required'=>'Bạn hãy chọn ảnh nhé!',
                
            ]);

            $file_name= $request->file('url')->getClientOriginalName();
    	    $new = Slide::find($id);
            $new->slogan= $request->slogan;

            $link='uploads/slider/'.$file_name;
            $new->url= $link;
	    	$new->status= $request->status;
            $request->file('url')->move('public/uploads/slider',$file_name);
	    	$new->updated_at=now();
	    	$new->save();
	    	 return redirect('admin/QLSlide/danhsach')->with('thongbao','Sửa slide thành công !');
    }
    public function getDel($id){
        $slide=Slide::find($id);
        $slide->delete();
        return redirect('admin/QLSlide/danhsach');
    }
}
