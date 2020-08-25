<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Homestay;

class HotDealController extends Controller
{
    public function index(){
        $matp = Homestay::select('matp')->where('status','1')->groupBy('matp')->get();
        $urlSearch ='&datepicker1=&datepicker2=&num_room=1&num_adult=2&num_chil=0';
        
        return view('user.pages.hot_deal',compact('matp','urlSearch'));
    }
}
