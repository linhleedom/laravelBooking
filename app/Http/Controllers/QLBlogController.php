<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Blog;
use App\District;
use App\Province;
class QLBlogController extends Controller
{

    public function getDanhSach(){
    	$blog= Blog::all();
    	return view('admin.QLBlog.danhsach',['blog'=>$blog]);
    }
    public function getDetail($id){
        $blog= Blog::find($id);
        $province=Province::all();
    	return view('admin.QLBlog.detail',['blog'=>$blog],['province'=>$province]);
    }
    public function getEdit($id){
        $blog= Blog::find($id);
        $province=Province::all();
        $district=District::all();
    	return view('admin.QLBlog.edit',['blog'=>$blog,'district'=>$district,'province'=>$province]);
    }
    public function postEdit(Request $request, $id)
    {

             $this->validate($request,
            [
                'title'=>'required|min:3|max:100',
                // 'photo'=>'required',
                'post'=>'required',
                'maqh'=>'required',
                'status'=>'required',
            ],
            [
                'title.required'=>'Không được để trống tiêu đề!',
                'title.min'=>'Tiêu đề quá ngắn ( từ 3 đến 100 kí tự !)',
                'title.max'=>'Tiêu đề quá dài ( từ 3 đến 100 kí tự !)',
                'post.required'=>'nhập thiếu nội dung',
                // 'photo.required'=>'Mời bạn chọn ảnh!',
                'maqh.required'=>'Mời bạn nhập maqh!',
                'status.required'=>'Hãy chọn trạng thái!',

            ]);
                
       
        $new = Blog::find($id);
       
        $new ->title= $request->title;
        $new ->alias=Str::slug($request->title);
        $new ->description= $request->description;
        $new ->post= $request->post;
        $new ->maqh= $request->maqh;
        $new ->status=$request->status;
        $new ->created_at= now();
        $new ->updated_at= now();
        if ($request->hasFile('photo')) {
            $file_name= $request->file('photo')->getClientOriginalName();
            $duoi=$request->file('photo')->getClientOriginalExtension();
            if ($duoi!='jpg'&& $duoi!='jpeg'&& $duoi!='png' && $duoi!='jfif') {
                 return redirect('admin/QLBlog/edit/'.$id)->with('loi','Bạn hãy chọn định dạng file ảnh jpg || jpeg || png || jfif');
            }
            $hinh= Str::random(5)."_".$file_name;
            $link='uploads/blog/'.$hinh;
            unlink("public/".$new->photo);
            $new ->photo= $link;
            $request->file('photo')->move('public/uploads/blog',$hinh);

        }
        
        $new->save();
        return redirect('admin/QLBlog/edit/'.$id)->with('thongbao','Sửa bài viết thành công !');
    }
    public function getDelete($id)
    {
        $blog= Blog::find($id);
        $blog->delete();
        return redirect('admin/QLBlog/danhsach');
    }
}
