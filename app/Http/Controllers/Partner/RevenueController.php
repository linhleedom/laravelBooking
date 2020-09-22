<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Bill;

class RevenueController extends Controller
{
    public function index(){
        return view ('partner.my_order.totalrevenue');
    }
    public function getTime(Request $request){
        $datepicker1 = date( "Y-m-d", strtotime( $request->datepicker1 ));
        $datepicker2 = date( "Y-m-d", strtotime( $request->datepicker2 ));
        $status = $request->status;
        $listOrder = Order::where([['date_start','>=',$datepicker1],['date_end','<=',$datepicker2]])
                            ->orWhere([['date_start','<=',$datepicker1],['date_end','>=',$datepicker1]])
                            ->orWhere([['date_start','<=',$datepicker2],['date_end','>=',$datepicker2]])
                            ->groupBy('bill_id')
                            ->pluck('bill_id')
                            ->toArray();
        if($status == 3){
            $listBill = Bill::whereIn('id',$listOrder)->get(); 
        }elseif($status == 0) 
        {
            $listBill = Bill::whereIn('id',$listOrder)->where('status',0)->get(); 
        }elseif($status == 1) 
        { 
            $listBill = Bill::whereIn('id',$listOrder)->where('status',1)->get(); 
        }elseif($status == 2) 
        {
            $listBill = Bill::whereIn('id',$listOrder)->where('status',2)->get(); 
        }           
        return view ('partner.ajax.list-bill',compact('listBill'));                   
    }
}
