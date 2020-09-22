<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Homestay;
use App\Product;
use App\Bill;
use App\Order;
use App\Rating;

class HomePartnerController extends Controller
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
    public function getHomePartner()
    {
        $homestay = Homestay::where('user_id',Auth::user()->id)->get();
        $homestayforPartner = array();
        foreach ($homestay as $homestayVal){
            array_push($homestayforPartner, $homestayVal->id);
        };
        $product = Product::whereIn('homestay_id',$homestayforPartner)->get();

        $productforOrder = array();
        foreach ($product as $productVal){
            array_push($productforOrder, $productVal->id);
        };
        
        $Order = Order::whereIn('product_id',$productforOrder)->get();

        $orderofBill = array();
        foreach ($Order as $OrderVal){
            array_push($orderofBill, $OrderVal->bill_id);
        };
        
        $list_Bill = Bill::whereIn('id',$orderofBill)->get();

        $comments = Rating::whereIn('homestay_id',$homestayforPartner)->get();
        return view ('partner.trangchu',[
            'homestay'=>$homestay,
            'products'=>$product,
            'bill'=>$list_Bill,
            'comments'=>$comments
        ]);
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('partner/login-partner');
    }
}
