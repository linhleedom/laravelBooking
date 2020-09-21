<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CancelBill;
use App\Bill;
use App\Order;

class CancelBillController extends Controller
{
    public function index(Request $request){
        $result = CancelBill::where('token', $request->token)->first();
    	if($result){
            $bill_id = $result->bill_id;
            $token = $result->token;
            $bill = Bill::where('id', $bill_id)->firstOrFail();
    		return view('user.pages.cancel_bill_no_account', compact('bill','token'));
    	} else {
    		return redirect()->route('userError');
        }
    }

    public function cancelBillPost(Request $request){
        $result = CancelBill::where('token', $request->token)->first();
    	if($result){
            $bill = Bill::where('id', $result->bill_id)->firstOrFail();
            $today      = strtotime(date('Y-m-d'));
            $date_start = strtotime($bill->order->first()->date_start);
            if( $date_start - $today>= '172800' ){
                if($bill->status == 0){
                    $bill->status = 1;
                    $bill->update();
                }
                foreach($bill->order as $order){
                    $order = Order::find($order->id);
                    if($order->status == 1){
                        $order->status = 0;
                        $order->update();
                    }
                }
                // Delete token
                CancelBill::where('token', $request->token)->delete();
                return redirect()->route('userCancelBillSuccess');
            }else{
                return redirect()->back()->with(['cancelBill'=>'fail','massage'=>'Đã quá 2 ngày gia hạn hủy phòng, vui lòng liên hệ trực tiếp với chủ nhà']);
            }
    	} else {
    		return redirect()->route('userError');
        }
    }

    public function cancelBillSuccess(){
        return view('user.pages.cancel_bill_success');
    }
}
