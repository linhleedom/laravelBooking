<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
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



    public function getIndex(){
        return view('partner.trangchu');
    }

    

    public function getHomestay(){
        return view('partner.homestay.homestay');
    }

    public function getRoom(){
        return view ('partner.room.room');
    }

    public function getHome_add(){
        return view('partner.home-add');
    }

    public function getAdd_homestay(){
        return view('partner.homestay.add-homestay');
    }

    public function getAdd_room(){
        return view('partner.room.add-room');
    }

    public function getEdit_detail_booking(){
        return view('partner.my_order.Edit-detail-booking');
    }

    public function getEdit_list_homestay(){
        return view('partner.homestay.Edit-list-homestay');
    }

    public function getEdit_list_room(){
        return view('partner.room.Edit-list-room');
    }
    
    public function getList_homestay(){
        return view('partner.homestay.list-homestay');
    }

    public function getList_mybooking(){
        return view('partner.my_order.list-mybooking');
    }

    public function getList_room(){
        return view('partner.room.list-room');
    }

    public function getMy_detail_booking(){
        return view('partner.my_order.my-detail-booking');
    }

    public function getPays_home(){
        return view('partner.pays.pays-home');
    }

    public function getPays_new_step1(){
        return view('partner.pays.pays-new-step1');
    }

    public function getPays_new_step2(){
        return view('partner.pays.pays-new-step2');
    }

    public function getPays_new_step3(){
        return view('partner.pays.pays-new-step3');
    }

    public function getLogin_and_Register(){
        return view('partner.login.login-and-register');
    }
    public function getReset_Pass_Step1(){
        return view('partner.login.reset-pass-step1');
    }

    public function getReset_Pass_Step2(){
        return view('partner.login.reset-pass-step2');
    }

    public function getReset_Pass_Step3(){
        return view('partner.login.reset-pass-step3');
    }
}
