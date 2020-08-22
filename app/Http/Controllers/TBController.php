<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class TBController extends Controller
{
    public function getThemBai(){
    	return view('admin.thembai');
    }

    public function postThemBai(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required|min:3|max:100',
                'photo'=>'required',
                'post'=>'required',
                'xaid'=>'required',
                'status'=>'required',
            ],
            [
                'title.required'=>'Không được để trống tiêu đề!',
                'title.min'=>'Tiêu đề quá ngắn ( từ 3 đến 100 kí tự !)',
                'title.max'=>'Tiêu đề quá dài ( từ 3 đến 100 kí tự !)',
                'post.required'=>'nhập thiếu nội dung',
                'photo.required'=>'Mời bạn chọn ảnh!',
                'xaid.required'=>'Mời bạn nhập xaid!',
                'status.required'=>'Hãy chọn trạng thái!',

            ]);
                
        $file_name= $request->file('photo')->getClientOriginalName();
    	$new = new Blog;
    	$new ->title= $request->title;
        $link='uploads/blog/'.$file_name;
    	$new ->photo= $link;
        $new ->description= $request->description;
    	$new ->post= $request->post;
        $new ->maqh= $request->xaid;
        $new ->status=$request->status;
        $new ->created_at= now();
        $new ->updated_at= now();
        
        // dd($link)
        $request->file('photo')->move('public/uploads/blog',$file_name);
    	$new->save();
        return redirect('admin/thembai')->with('thongbao','Thêm bài viết thành công !');
    }
}
