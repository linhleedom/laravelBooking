<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bill;
use App\Order;
use App\Product;
use App\Homestay;
class OrderController extends Controller
{

    function getInfoOrder($id){
        
        $product = Product::all();
        $homestay = Homestay::get();
        $order = Order::find($id);
        $order = Order::where('bill_id','=',$id)->get();
        
        // dd($homestay);
        

        return view ('partner.my_order.my-orders',
        ['product'=> $product],
        ['order'=> $order],
        ['homestay'=> $homestay]);
    }
}
