<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class QLBlogController extends Controller
{

    public function getDanhSach(){
    	$blog= Blog::all();
    	return view('admin.QLBlog.danhsach',['blog'=>$blog]);
    }
    public function getDetail($id){
        $blog= Blog::find($id);
    	return view('admin.QLBlog.detail',['blog'=>$blog]);
    }
    public function getEdit($id){
        $blog= Blog::find($id);
    	return view('admin.QLBlog.edit',['blog'=>$blog]);
    }
    public function postEdit(Request $request, $id){
        $blog =Blog::find($id);
            $blog->title= $request->title;
            $blog->photo= $request->photo;
            $blog->description= $request->description;
            $blog->post= $request->post;
            $blog->xaid= $request->xaid;
            $blog->status= $request->status;
            $blog->updated_at= $request->updated_at;
            $blog->save();
            return redirect('admin/QLBlog/danhsach');
    }
    public function getDelete($id)
    {
        $blog= Blog::find($id);
        $blog->delete();
        return redirect('admin/QLBlog/danhsach');
    }
}
