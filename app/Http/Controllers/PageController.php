<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getHome(){
        return view('user.pages.home');
    }
    public function getBlog(){
        return view('user.pages.blog');
    }
    public function getHotDeal(){
        return view('user.pages.hot_deal');
    }
    public function getError(){
        return view('user.pages.error');
    }
    public function getSearchResult(){
        return view('user.pages.search_result');
    }
    public function getRoomDetail(){
        return view('user.pages.room_detail');
    }
    public function getBlogDetail(){
        return view('user.pages.blog_detail');
    }
    public function getAccount(){
        return view('user.pages.account');
    }
    public function getTermOfSevice(){
        return view('user.pages.terms_of_sevices');
    }
    public function getBookingStep1(){
        return view('user.pages.booking_step_1');
    }
    public function getBookingStep2(){
        return view('user.pages.booking_step_2');
    }
    public function getBookingStep3(){
        return view('user.pages.booking_step_3');
    }
    public function getResetPassStep1(){
        return view('user.pages.reset_pass_step_1');
    }
    public function getResetPassStep2(){
        return view('user.pages.reset_pass_step_2');
    }
    public function getResetPassStep3(){
        return view('user.pages.reset_pass_step_3');
    }
    public function getLoading(){
        return view('user.pages.loading');
    }
}
