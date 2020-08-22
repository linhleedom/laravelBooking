<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Bill;

class BookingController extends Controller
{
    public function getDanhSach()
    {
        $order = Order::all(); 
    	return view('admin.booking.danhsach',['order'=>$order]);
    }
    public function getDetail()
    {
    	return view('admin.booking.detail');
    }
    public function getEdit($id)
    {
        $bill= Bill::find($id);
    	return view('admin.booking.edit',['bill'=>$bill]);
    }
    public function postEdit(Request $request,$id)
    {
        $bill= Bill::find($id);
        // $this= validate(
        //     [
        //         'name'=>'required|unique:Bill,name|max:100'
        //     ],
        //     [
        //         'name.required'=>'Bạn chưa nhập tên',
        //         'name.unique'=>'Tên bị trùng',
        //         'name.max'=>'Tên không dài quá 100 kí tự',
        //     ]
        // );
        $bill ->name= $request->name;
        $bill ->email= $request->email;
        $bill ->phone= $request->phone;
        $bill ->payments= $request->payments;
        $bill ->save();
        return redirect('admin/booking/danhsach/');
    }
}
