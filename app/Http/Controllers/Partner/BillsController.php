<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bill;
use App\Homestay;
use App\Product;
use App\Order;

class BillsController extends Controller
{
    function getListBills(){
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
        
        $list_Bill = Bill::whereIn('id',$orderofBill)->paginate(2);
        // dd($Bill);

        return view ('partner.my_order.list-bills',['list_Bill'=>$list_Bill]);
    }

    function getEditbill($id){
        
        $bill = Bill::find($id);    
        return view ('partner.my_order.edit-status-bills',
        ['bill'=>$bill]);
    }

    function postEditbill(Request $request,$id){
        
        
        $edit_bill = Bill::find($id);  
        $edit_bill->status = $request->status;  
        
        $edit_bill->save();
        return back()->withInput()->with('thongbao','Sửa thành công ');
    }

}
