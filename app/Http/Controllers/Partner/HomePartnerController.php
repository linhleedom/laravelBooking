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
