<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Homestay;
use App\Product;
use App\Order;

class ManagerProductController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $homestayOfUser = Homestay::where('user_id', $user_id)->get();
        return view('partner.manage.manage_product', compact('homestayOfUser'));
    }
    public function getHomestay($id){
        $productOfHomestay = Product::where("homestay_id",$id)->pluck("name","id");
        return response()->json($productOfHomestay);
    }
    public function getOrder($id){
        $orderOfProduct = Order::where([['product_id',$id],['status','1']])->get();
        $data = array();
        foreach($orderOfProduct as $val){
            $data[] = array(
                'start' => $val->date_start.'T12:00:00',
                'end' => $val->date_end.'T12:00:00',
                'bill_id' => $val->bill_id,
                'title' => "Đơn hàng số:  ".$val->bill_id,
            );
        }
        return response()->json($data);
    }

}
