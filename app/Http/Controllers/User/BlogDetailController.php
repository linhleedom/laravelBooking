<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Homestay;

class BlogDetailController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        $blogDetail = Blog::where('status','1')->where('id',$id)->get();
        foreach($blogDetail as $blogDetailVal){}
        $maqh = $blogDetailVal->maqh;
        $homestaySuggest = Homestay::where('status','1')->where('maqh',$maqh)->take(5)->get();
        $urlSearch ='&datepicker1=&datepicker2=&num_room=1&num_adult=2&num_chil=0';
        return view('user.pages.blog_detail',compact('blogDetailVal','homestaySuggest','urlSearch'));
        // dd($homestaySuggest);
    }
}
