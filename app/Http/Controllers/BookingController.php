<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Bill;
use App\User;
use App\Product;
use App\Homestay;

class BookingController extends Controller
{
    public function getDanhSach()
    {
        $bill = Bill::where('status','0')->get(); 
        $user = User::all();
    	return view('admin.booking.danhsach',['bill'=>$bill],['user'=>$user]);
    }
    public function getListOrder($id)
    {
        $product=Product::all();
        $homestay=Homestay::all();
        $order=Order::find($id);
        $order=Order::where('bill_id','=',$id)->get();
        return view('admin.booking.listorder',['order'=>$order],['product'=>$product],['homestay'=>$homestay]);
    }
    
}
