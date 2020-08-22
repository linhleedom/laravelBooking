<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
        $blog = Blog::where('status','1')->paginate(12);
        return view('user.pages.blog', compact('blog'));
    }
}
