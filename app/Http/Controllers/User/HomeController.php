<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
use App\Homestay;
use App\District;
use App\Province;
use App\Order;
use App\Bill;

class HomeController extends Controller
{
    public function __construct(){
        $today = date('Y-m-d');
        $orderSucces = Order::where('date_end','<=',$today)->get();
        $bill_id_success = array();

        foreach($orderSucces as $orderSuccessVal){
            $order = Order::find($orderSuccessVal->id);
            if($orderSuccessVal->status == 1){
                $order->status = 0;
                $order->update();
            }
            array_push($bill_id_success,$orderSuccessVal->bill_id); 
        }

        $bill_seccess = Bill::whereIn('id',$bill_id_success)->get();
        foreach($bill_seccess as $bill_seccess_val){
            $bill = Bill::find($bill_seccess_val->id);
            if($bill_seccess_val->status == 0){
                $bill->status = 2;
                $bill->update();
            }
        }
    }

    public function index(){

        $slide = Slide::where('status', '1')->get();
        
        $homestayTopRate = Homestay::where('status', '1')->orderBy('point', 'DESC')->take(8)->get();
        $homestay = Homestay::where('status', '1')->take(8)->get();
        $urlSearch ='&datepicker1=&datepicker2=&num_room=1&num_adult=2&num_chil=0';
        return view('user.pages.home', compact('slide','homestay','homestayTopRate','urlSearch'));
    }

    public function autoComplete(Request $request){
        $term = $request->get('term');
        $district = District::where('name', 'like', '%'.$term.'%')->get();
        $province = Province::select('name')->where('name', 'like', '%'.$term.'%')->get();

        $nameDistrict = array();
        foreach($district as $districtVal){
            array_push($nameDistrict,$districtVal->name.' - '.$districtVal->province->name);
        };
        $nameProvince = array();
        foreach($province as $provinceVal){
            array_push($nameProvince,$provinceVal->name);
        };
        $name = array_merge($nameProvince, $nameDistrict);
        return json_encode($name);
    }

    public function getError(){
        return view('user.pages.error');
    }
    public function conditions(){
        return view('user.pages.terms_of_sevices');
    }
}
