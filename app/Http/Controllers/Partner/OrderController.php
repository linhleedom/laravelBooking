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

        return view ('partner.my_order.my-orders',
        ['product'=> $product],
        ['order'=> $order],
        ['homestay'=> $homestay]);
    }
    function getEditOrder($id){
        
        $order = Order::find($id);    
        // dd($order);    
        $list_Bill = Bill::find($id);
        return view ('partner.my_order.edit-status-order',
        ['order'=> $order],
        ['list_Bill'=>$list_Bill]);
    }

    function postEditOrder(Request $request,$id){
        
        
        $order = Order::find($id);  
        $order->status = $request->status;  

        $order->save();
        return back()->withInput()->with('thongbao','Cập nhật thành công | Kiểm tra tại thông tin hóa đơn ');
    }

}
