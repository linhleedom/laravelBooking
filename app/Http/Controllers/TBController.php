<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Blog;
use App\District;
use App\Province;
class TBController extends Controller
{
    public function getThemBai(){
        $district= District::all();
        $province= Province::all();
    	return view('admin.thembai',['district'=>$district,'province'=>$province]);
    }

    public function postThemBai(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required|min:3|max:100',
                'photo'=>'required',
                'post'=>'required',
                'maqh'=>'required',
                'status'=>'required',
            ],
            [
                'title.required'=>'Không được để trống tiêu đề!',
                'title.min'=>'Tiêu đề quá ngắn ( từ 3 đến 100 kí tự !)',
                'title.max'=>'Tiêu đề quá dài ( từ 3 đến 100 kí tự !)',
                'post.required'=>'nhập thiếu nội dung',
                'photo.required'=>'Mời bạn chọn ảnh!',
                'maqh.required'=>'Mời bạn chọn quận huyện!',
                'status.required'=>'Hãy chọn trạng thái!',

            ]);
                
        $file_name= $request->file('photo')->getClientOriginalName();
    	$new = new Blog;
    	$new ->title= $request->title;
        $link='uploads/blog/'.$file_name;
    	$new ->photo= $link;
        $new ->description= $request->description;
    	$new ->post= $request->post;
        $new ->maqh= $request->maqh;

        $new ->alias=Str::slug($request->title);
        $new ->status=$request->status;
        $new ->created_at= now();
        $new ->updated_at= now();
        
        // dd($link)
        $request->file('photo')->move('public/uploads/blog',$file_name);
    	$new->save();
        return redirect('admin/thembai')->with('thongbao','Thêm bài viết thành công !');
    }
    public function getmaqh($matp){
        $district= District::where('matp',$matp)->get();
        foreach ($district as $tlu) {
            echo " <option value='".$tlu->maqh."'>".$tlu->name."</option>";
        }
    }
}
