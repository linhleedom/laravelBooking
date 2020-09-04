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
use App\Bill;
use App\RoomType;
use App\Utilities;



class SearchResultController extends Controller
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

    public function SearchAddress($address){
        if( strlen(strstr($address, "-")) > 0 ){
            $add = explode(' - ', $address );
            $district = $add[0];
            $province = $add[1];
            $maqh = District::select('maqh')->where('name',$district)->value('maqh');
            $homestay = Homestay::where([['status', '1'],['maqh',$maqh]])->get();
        }else{
            $district = '';
            $province = $address; 
            $matp = Province::select('matp')->where('name',$province)->value('matp');
            $homestay = Homestay::where([['status', '1'],['matp',$matp]])->get();
        }
        
        $homestay_id = array();
        foreach( $homestay as $homestayVal ){
            array_push( $homestay_id, $homestayVal->id );
        }
        // return json_encode($homestay_id);
        return array($homestay_id,$province,$district);
    }

    public function SearchRoomType($num_room,$num_adult,$num_chil){
        if( isset($num_room) && isset($num_adult) && isset($num_chil) && $num_room !== '0'){
            $capacity = $num_adult/$num_room;
            if($capacity <= 5){
                $room_type = RoomType::where('status', '1')->whereBetween('capacity',[$capacity-1,$capacity+1])->get();
            }else{
                $room_type = RoomType::where([['status', '1'],['capacity','>=',$capacity]])->get();
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
        return $room_type_id;
    }

    public function SearchDate($datepicker1,$datepicker2){
        $check_in = date( "Y-m-d", strtotime( $datepicker1 ));
        $check_out = date( "Y-m-d", strtotime( $datepicker2 ));
        $order = Order::where([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>=',$check_out] ])
                        ->orWhere([ ['status','1'] , ['date_start','>=',$check_in] , ['date_end','<=',$check_out] ])  
                        ->orWhere([ ['status','1'] , ['date_start','<',$check_out] , ['date_end','>=',$check_out] ])
                        ->orWhere([ ['status','1'] , ['date_start','<=',$check_in] , ['date_end','>',$check_in] ])
                        ->get();
        $product_actived_id = array();
        foreach( $order as $orderVal ){
            array_push( $product_actived_id, $orderVal->product_id );
        }
        return $product_actived_id;
    }
    public function index(Request $request){
        $address = $request->address;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $num_room = $request->num_room;
        $num_adult = $request->num_adult;
        $num_chil = $request->num_chil;

        
        $searchAddress = $this->SearchAddress($address);
        
        $homestay_id = $searchAddress['0'];
        $province = $searchAddress['1'];
        $district = $searchAddress['2'];

        $room_type_id = $this->SearchRoomType($num_room,$num_adult,$num_chil);

        if( isset($datepicker1) && isset($datepicker2) ){
            $product_actived_id = $this->SearchDate($datepicker1,$datepicker2);
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
        // dd($homestay);
        $url ='&datepicker1='.$datepicker1.'&datepicker2='.$datepicker2.'&num_room='.$num_room.'&num_adult='.$num_adult.'&num_chil='.$num_chil;
        // dd($product);
        return view('user.pages.search_result', compact('address','province','district','datepicker1','datepicker2','num_room','num_adult','num_chil','product','url'));
    }

    public function filter(Request $request){
        $amount = $request->amount;
        $address = $request->address;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $num_room = $request->num_room;
        $num_adult = $request->num_adult;
        $num_chil = $request->num_chil;

        $searchAddress = $this->SearchAddress($address);
        
        $homestay_id = $searchAddress['0'];
        $province = $searchAddress['1'];
        $district = $searchAddress['2'];

        $room_type_id = $this->SearchRoomType($num_room,$num_adult,$num_chil);
        $product_actived_id = $this->SearchDate($datepicker1,$datepicker2);
        $search = Product::where('status', '1')
                        ->whereIn('homestay_id',$homestay_id)
                        ->whereNotIn('id',$product_actived_id)
                        ->whereIn('room_type_id',$room_type_id)
                        ->groupBy('homestay_id');
        if(empty($amount) || count($amount) == 3){
            $product = $search->paginate(9);
        }else{
            if(count($amount) == 1){
                if($amount['0'] == '300'){
                    $product = $search->where('prices','<=','300000')->paginate(9);
                }elseif($amount['0'] == '300-600'){
                    $product = $search->whereBetween('prices', [300000, 600000])->paginate(9);
                }elseif($amount['0'] == '600'){
                    $product = $search->where('prices','>=','600000')->paginate(9);
                }
            }elseif(count($amount) == 2){
                if($amount === ['300','300-600']){
                    $product = $search->where('prices','<=','600000')->paginate(9);
                }elseif($amount === ['600','300-600']){
                    $product = $search->where('prices','>=','300000')->paginate(9);
                }elseif($amount === ['300','600']){
                    $product = $search->where('prices','>=','600000')->orWhere('prices','<=','300000')->paginate(9);
                }
            }
        }
        $url ='&datepicker1='.$datepicker1.'&datepicker2='.$datepicker2.'&num_room='.$num_room.'&num_adult='.$num_adult.'&num_chil='.$num_chil;
        return view('user.ajax.search_result', compact('address','province','district','datepicker1','datepicker2','num_room','num_adult','num_chil','product','url'));
    }

    public function orderBy(Request $request){
        $address = $request->address;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $num_room = $request->num_room;
        $num_adult = $request->num_adult;
        $num_chil = $request->num_chil;

        $searchAddress = $this->SearchAddress($address);
        $homestay_id = $searchAddress['0'];
        $province = $searchAddress['1'];
        $district = $searchAddress['2'];

        $room_type_id = $this->SearchRoomType($num_room,$num_adult,$num_chil);
        $product_actived_id = $this->SearchDate($datepicker1,$datepicker2);
        if($request->orderBy === "asc"){
            $product = Product::where('status', '1')
                                ->whereIn('homestay_id',$homestay_id)
                                ->whereNotIn('id',$product_actived_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->orderBy('prices', 'asc')
                                ->groupBy('homestay_id')
                                ->paginate(9);
                                // dd('dddd');
        }elseif($request->orderBy === "desc"){
            $product = Product::where('status', '1')
                                ->whereIn('homestay_id',$homestay_id)
                                ->whereNotIn('id',$product_actived_id)
                                ->whereIn('room_type_id',$room_type_id)
                                ->orderBy('prices', 'desc')
                                ->groupBy('homestay_id')
                                ->paginate(9);
        }
        
        $url ='&datepicker1='.$datepicker1.'&datepicker2='.$datepicker2.'&num_room='.$num_room.'&num_adult='.$num_adult.'&num_chil='.$num_chil;
        return view('user.ajax.search_result', compact('address','province','district','datepicker1','datepicker2','num_room','num_adult','num_chil','product','url'));
        // dd($product);
    }

}
