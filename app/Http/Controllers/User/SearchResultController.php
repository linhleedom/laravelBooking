<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
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
        $address = $request->address;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $num_room = $request->num_room;
        $num_adult = $request->num_adult;
        $num_chil = $request->num_chil;

        //get address
        if( strlen(strstr($address, "-")) > 0 ){
            $add = explode(' - ', $address );
            $district = $add[0];
            $province = $add[1];
            $maqh = District::select('maqh')->where('name',$district)->value('maqh');
            $homestay = Homestay::where('status', '1')->where('maqh',$maqh)->get();
        }else{
            $district = '';
            $province = $address; 
            $matp = Province::select('matp')->where('name',$province)->value('matp');
            $homestay = Homestay::where('status', '1')->where('matp',$matp)->get();
        }
        $homestay_id = array();
        foreach( $homestay as $homestayVal ){
            array_push( $homestay_id, $homestayVal->id );
        }

        if( isset($num_room) && isset($num_adult) && isset($num_chil) && $num_room !== '0'){
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
                                ->whereIn('homestay_id',$homestay_id)   
                                ->whereNotIn('id',$product_actived_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->groupBy('homestay_id')
                                ->paginate(9);
        }else{
            $product = Product::where('status', '1')
                                ->whereIn('homestay_id',$homestay_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->groupBy('homestay_id')
                                ->paginate(9);
        }
        $utilities = Utilities::all()->take(5);

        $url ='&datepicker1='.$datepicker1.'&datepicker2='.$datepicker2.'&num_room='.$num_room.'&num_adult='.$num_adult.'&num_chil='.$num_chil;
        // dd($product);
        return view('user.pages.search_result', compact('address','province','district','datepicker1','datepicker2','num_room','num_adult','num_chil','homestay','product','utilities','room_type', 'url'));
    }

}
