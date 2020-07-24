<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getHome(){
        return view('user.home');
    }
    public function getBlog(){
        return view('user.blog');
    }
    public function getHotDeal(){
        return view('user.hot_deal');
    }
}
