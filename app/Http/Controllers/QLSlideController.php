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
    public function postEdit(Request $request, $id){
    	$silde = Slide::find($id);
            $slide->slogan= $request->slogan;
    		$slide->url= $request->url;
	    	$slide->status= $request->status;
	    	$slide->updated_at=now();
	    	$slide->save();
	    	 return redirect('admin/QLSlide/edit/'.$slide->id);
    }
    public function getDel($id){
        $slide=Slide::find($id);
        $slide->delete();
        return redirect('admin/QLSlide/danhsach');
    }
}
