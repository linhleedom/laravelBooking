<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class TSController extends Controller
{
    public function getTS(){
    	return view('admin.themslide');
    }
    public function postTS(Request $request){
    	$file_name= $request->file('url')->getClientOriginalName();
    	$new=new Slide;
    	$new->slogan= $request->slogan;
    	$new->url= $request->url;
    	$new->status= $request->status;
    	$new ->created_at= now();
        $new ->updated_at= now();
        $request->file('url')->move('public/uploads/slider',$file_name);
    	$new->save();
        return redirect('admin/themslide');
    }
}

