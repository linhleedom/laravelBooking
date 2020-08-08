<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Homestay;
use App\Product;
use App\Province;
use App\District;
use App\Ward;
use App\Order;
use App\RoomType;
use App\Utilities;



class SearchResultController extends Controller
{
    public function index(Request $request){
        //get address
        $address = $request->address;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $num_room = $request->num_room;
        $num_adult = $request->num_adult;
        $num_chil = $request->num_chil;

        // $maqh = District::select('maqh')->where('name',$address)->value('maqh');
        // $check_in = date( "Y-m-d", strtotime( $request->datepicker1 ));
        // $check_out = date( "Y-m-d", strtotime( $request->datepicker2 ));
        // if($datepicker1 == "" || $datepicker2 == ""){
        //     $homestay = Homestay::where('status', '1')->where('maqh',$maqh)->get();
        // }else{
        //     // get order actived
        //     $order = Order::where([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>=',$check_out] ])
        //                 ->orWhere([ ['status','1'] , ['date_start','>=',$check_in] , ['date_end','<=',$check_out] ])  
        //                 ->orWhere([ ['status','1'] , ['date_start','<',$check_out] , ['date_end','>=',$check_out] ])
        //                 ->orWhere([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>',$check_in] ])
        //                 ->get();
        //     // get product_id actived
        //     $product_id = array();
        //     foreach( $order as $orderVal ){
        //         array_push( $product_id, $orderVal->product_id );
        //     }
        //     // get room_type 
        //     $capacity = $num_adult/$num_room;
        //     $room_type = RoomType::select('id')->where('status', '1')->where('capacity','>=',$capacity)->get();
        //     $room_type_id = array();
        //     foreach( $room_type as $room_typeVal ){
        //         array_push( $room_type_id, $room_typeVal->id );
        //     }
        //     // get product not actived
        //     $product = Product::where('status', '1')->whereNotIn('id',$product_id)->whereIn('room_type_id',$room_type_id)->get();
        //     //get homestay_id not actived
        //     $homestay_id = array();
        //     foreach( $product as $productVal ){
        //         array_push( $homestay_id ,$productVal['homestay_id'] );
        //     }
        //     $homestay = Homestay::where('status', '1')->where('maqh',$maqh)->whereIn('id',$homestay_id)->get();
        //     dd($room_type);
        // }

        $matp = Province::select('matp')->where('name',$address)->value('matp');
        $maqh = District::select('maqh')->where('name',$address)->value('maqh');

        $homestay = Homestay::where('status', '1')->where('matp',$matp)->orWhere('maqh',$maqh)->get();
        $homestay_id = array();
        foreach( $homestay as $homestayVal ){
            array_push( $homestay_id, $homestayVal->id );
        }

        $capacity = $num_adult/$num_room;
        $room_type = RoomType::where('status', '1')->where('capacity','>=',$capacity)->get();
        $room_type_id = array();
        foreach( $room_type as $room_typeVal ){
            array_push( $room_type_id, $room_typeVal->id );
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
                                ->whereIn('homestay_id',$homestay_id)   
                                ->whereNotIn('id',$product_actived_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->get();
        }else{
            $product = "";
        }
        $utilities = Utilities::all()->take(5);
        // dd($homestay);
        return view('user.pages.search_result', compact('address','datepicker1','datepicker2','num_room','num_adult','num_chil','homestay','product','utilities','room_type'));
    }

}
