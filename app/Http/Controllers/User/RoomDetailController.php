<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Homestay;
use App\Product;
use App\Order;
use App\Bill;
use App\RoomType;
use Session;

class RoomDetailController extends Controller
{
    public function __construct(){
        $today = date('Y-m-d');
        $orderSucces = Order::where('date_end','<=',$today)->get();
        $bill_id_success = array();

        foreach($orderSucces as $orderSuccessVal){
            $order = Order::find($orderSuccessVal->id);
            if($orderSuccessVal->status == 1){
                $order->status = 0;
                $order->update();
            }
            array_push($bill_id_success,$orderSuccessVal->bill_id); 
        }

        $bill_seccess = Bill::whereIn('id',$bill_id_success)->get();
        foreach($bill_seccess as $bill_seccess_val){
            $bill = Bill::find($bill_seccess_val->id);
            if($bill_seccess_val->status == 0){
                $bill->status = 2;
                $bill->update();
            }
        }
    }

    public function index(Request $request){
        $homestay_id = $request->id;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $num_room = $request->num_room;
        $num_adult = $request->num_adult;
        $num_chil = $request->num_chil;

        $homestayVal = Homestay::find($homestay_id);
        if( isset($num_room) && isset($num_adult) && isset($num_chil) && $num_room !== '0' ){
            $capacity = $num_adult/$num_room;
            if($capacity <= 5){
                $room_type = RoomType::where('status', '1')->whereBetween('capacity',[$capacity-1,$capacity+1])->get();
            }else{
                $room_type = RoomType::where('status', '1')->where('capacity','>=',$capacity)->get();
            }
            $room_type_id = array();
            foreach( $room_type as $room_typeVal ){
                array_push( $room_type_id, $room_typeVal->id );
            }
        }else{
            $room_type = RoomType::where('status', '1')->get();
            $room_type_id = array();
            foreach( $room_type as $room_typeVal ){
                array_push( $room_type_id, $room_typeVal->id );
            }
        }
        
        if( isset($datepicker1) && isset($datepicker2) ){
            $check_in = date( "Y-m-d", strtotime( $request->datepicker1 ));
            $check_out = date( "Y-m-d", strtotime( $request->datepicker2 ));
            $order = Order::where([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>=',$check_out] ])
                            ->orWhere([ ['status','1'] , ['date_start','>=',$check_in] , ['date_end','<=',$check_out] ])  
                            ->orWhere([ ['status','1'] , ['date_start','<',$check_out] , ['date_end','>=',$check_out] ])
                            ->orWhere([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>',$check_in] ])
                            ->get();
            $product_actived_id = array();
            foreach( $order as $orderVal ){
                array_push( $product_actived_id, $orderVal->product_id );
            }
            $product = Product::where('status', '1')
                                ->where('homestay_id',$homestay_id)   
                                ->whereNotIn('id',$product_actived_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->get();
        }else{
            $product = Product::where('status','1')
                                ->where('homestay_id',$homestay_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->get();
        }
        $url ='&datepicker1='.$datepicker1.'&datepicker2='.$datepicker2.'&num_room='.$num_room.'&num_adult='.$num_adult.'&num_chil='.$num_chil;
        return view('user.pages.room_detail', compact('homestayVal','product','url','datepicker1','datepicker2','num_room','num_adult','num_chil'));
    }

    public function searchRoomAjax(Request $request){
        $homestay_id = $request->id;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $num_room = $request->num_room;
        $num_adult = $request->num_adult;
        $num_chil = $request->num_chil;

        $homestayVal = Homestay::find($homestay_id);
        if( isset($num_room) && isset($num_adult) && isset($num_chil) && $num_room !== '0' ){
            $capacity = $num_adult/$num_room;
            if($capacity <= 5){
                $room_type = RoomType::where('status', '1')->whereBetween('capacity',[$capacity-1,$capacity+1])->get();
            }else{
                $room_type = RoomType::where('status', '1')->where('capacity','>=',$capacity)->get();
            }
            $room_type_id = array();
            foreach( $room_type as $room_typeVal ){
                array_push( $room_type_id, $room_typeVal->id );
            }
        }else{
            $room_type = RoomType::where('status', '1')->get();
            $room_type_id = array();
            foreach( $room_type as $room_typeVal ){
                array_push( $room_type_id, $room_typeVal->id );
            }
        }
        
        if( isset($datepicker1) && isset($datepicker2) ){
            $check_in = date( "Y-m-d", strtotime( $request->datepicker1 ));
            $check_out = date( "Y-m-d", strtotime( $request->datepicker2 ));
            $order = Order::where([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>=',$check_out] ])
                            ->orWhere([ ['status','1'] , ['date_start','>=',$check_in] , ['date_end','<=',$check_out] ])  
                            ->orWhere([ ['status','1'] , ['date_start','<',$check_out] , ['date_end','>=',$check_out] ])
                            ->orWhere([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>',$check_in] ])
                            ->get();
            $product_actived_id = array();
            foreach( $order as $orderVal ){
                array_push( $product_actived_id, $orderVal->product_id );
            }
            $product = Product::where('status', '1')
                                ->where('homestay_id',$homestay_id)   
                                ->whereNotIn('id',$product_actived_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->get();
        }else{
            $product = Product::where('status','1')
                                ->where('homestay_id',$homestay_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->get();
        }
        return view('user.ajax.search_room_detail', compact('homestayVal','product','datepicker1','datepicker2','num_room','num_adult','num_chil'));
        dd($product);
    }
}
