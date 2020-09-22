<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
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
        $sli= Slide::orderBy('order','asc')->get();
    	return view('admin.QLSlide.edit',['slide'=>$slide,'sli'=>$sli]);
    }
    public function postEdit(Request $request, $id)
    {
           $this->validate($request,
            [
                'slogan'=>'required|min:3|max:100',
                'slogan2'=>'required|min:3|max:100',
               
                
            ],
            [
                'slogan.required'=>'Bạn chưa nhập slogan!',
                'slogan.min'=>'Độ dài tối thiểu là 3 kí tự',
                'slogan.max'=>'Độ dài tối đa là 100 kí tự',
                'slogan2.required'=>'Bạn chưa nhập slogan!',
                'slogan2.min'=>'Độ dài tối thiểu là 3 kí tự',
                'slogan2.max'=>'Độ dài tối đa là 100 kí tự',
               
                
            ]);
    	    $new = Slide::find($id);
            $new->slogan= $request->slogan;
            $new->slogan2= $request->slogan2;
	    	$new->status= $request->status;
            $change=$new->order;

            $slide2= Slide::where('order','=',$request->order)->update(['order'=>$change]);
            $new->order=$request->order;

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
            // $slide4->save();
    	    return redirect('admin/QLSlide/edit/'.$id)->with('thongbao','Sửa slide thành công !');
        }

        public function getDel($id){
            $slide=Slide::find($id);
            $slide->delete();
        return redirect('admin/QLSlide/danhsach');
        }
        public function getTrash(Request $request)
        {
            $slide3=Slide::onlyTrashed()->get();
            return view('admin/QLSlide/trash',['slide3'=>$slide3]);
        }
        public function getUnTrash($id)
        {
            $slid=Slide::withTrashed()->find($id);
            $slid->restore();
            return redirect()->back()->with('thongbao','Bạn đã khôi phục thành công');
        }
       
}
