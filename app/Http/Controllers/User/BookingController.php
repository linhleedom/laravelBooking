<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session,Mail;
use App\Cart;
use App\Homestay;
use App\Bill;
use App\Order;
use App\Mail\user\mailInfor;
class BookingController extends Controller
{
    public function bookingStep1(Request $request){
        $id = $request->id;
        if(Session::has('Cart-homestay-'.$id)){
            $datepicker1 = $request->datepicker1;
            $datepicker2 = $request->datepicker2;
            $homestay = Homestay::find($id);
            return view('user.pages.booking_step_1', compact('homestay','datepicker1','datepicker2'));
        }else{
            return redirect()->back()->with(['check-session'=>'fail','massage'=>'Vui lòng chọn ít nhất 1 phòng']);
        }
        
    }

    public function bookingStep2(Request $request){
        $datepicker1 = $request->datepicker1;
        $datepicker2 = $request->datepicker2;
        $homestay_id = $request->homestay_id;

        if(Auth::check()){
            $validator = Validator::make($request->all(), 
                [
                    'name'=>'required',
                    'email'=>'required|email',
                    'phone'=>'required|numeric'
                ],[
                    'name.required'=>'Vui lòng nhập tên',
                    'email.required'=>'Vui lòng nhập email',
                    'email.email'=>'Email không hợp lệ',
                    'phone.numeric'=>'Số điện thoại không đúng định dạng',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator, 'logined');
            }
        }else{
            $validator = Validator::make($request->all(), 
                [
                    'name'=>'required',
                    'phone'=>'required|numeric',
                    'email'=>'required|email',
                    'confirm_email'=>'required|same:email'
                ],[
                    'name.required'=>'Vui lòng nhập tên',
                    'phone.numeric'=>'Số điện thoại không đúng định dạng',
                    'email.required'=>'Vui lòng nhập email',
                    'email.email'=>'Email không hợp lệ',
                    'confirm_email.required'=>'Vui lòng nhập email xác nhận',
                    'confirm_email.same'=>'Email xác nhận không khớp',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator, 'notLogin');
            }
        }

        if( Session::has('Cart-homestay-'.$homestay_id) ){
            $cart = Session::get('Cart-homestay-'.$homestay_id);
            $bill = new Bill;
            if(Auth::check()){
                $bill->user_id = Auth::user()->id;
            }else{
                $bill->user_id = 0;
            }
            $bill->name = $request->name;
            $bill->phone = $request->phone;
            $bill->email = $request->email;
            $bill->note = $request->note;
            $bill->status = 0;
            $bill->payments = $cart->totalPrice;
            $bill->save();

            foreach($cart->product as $key => $value){
                $order = new Order;
                $order->bill_id = $bill->id;
                $order->product_id = $key;
                $order->date_start = date( "Y-m-d", strtotime($datepicker1));
                $order->date_end = date( "Y-m-d", strtotime($datepicker2));
                $order->price = $value['productInfo']->prices*(100-$value['productInfo']->discount);
                $order->status = 1;
                $order->save();
            }
            Session::forget('Cart-homestay-'.$homestay_id);
            return redirect()->route('userBookingStep3',['id'=>$bill->id]);
        }else{
            return redirect()->route('userError');
        }
    }

    public function BookingStep3($id){
        $bill = Bill::find($id);
        Mail::to($bill->email)->send(new mailInfor($bill));
        return view('user.pages.booking_step_3', compact('bill'));
    }
}
