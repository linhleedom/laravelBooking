<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bill;
use App\Slide;
use App\Blog;
use App\Homestay;
class DBController extends Controller
{
   public function getDashBoard()
   {
   	$user=User::all();
   	$bill=Bill::all();
   	$slide=Slide::all();
   	$blog=Blog::all();
   	$homestay=Homestay::all();
   	return view('admin.dashboard',['user'=>$user,'bill'=>$bill,'slide'=>$slide,'blog'=>$blog,'homestay'=>$homestay]);

   }
}
