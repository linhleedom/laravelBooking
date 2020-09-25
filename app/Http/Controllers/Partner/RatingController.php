<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Rating;
use App\Homestay;

class RatingController extends Controller
{
    public function index(Request $request){
        $homestay_id = $request->id;
        $rate = Rating::where('homestay_id',$homestay_id)->paginate(3);
        return view('partner.homestay.rating-homestay',compact('rate'));
    }
    
    public function getChange($bill_id){
        $rate = Rating::find($bill_id);
        if($rate->status == 0){            
            $rate->status = 1;        
            $rate->update();
        }elseif($rate->status == 1) {            
            $rate->status = 0;        
            $rate->update();
        }
        return redirect()->back()->with(['thongbao'=>'success','massage'=>'Đổi trạng thái comments thành công']);
    }
}
