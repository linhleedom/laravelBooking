<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Homestay;
use App\Product;
use App\RoomType;
use App\Utilities;
use App\Uti_Pro;

class RoomController extends Controller
{
    public function getListRoom(){        
        // $product = Product::Join('Homestays','products.homestay_id','=','homestays.id')
        // ->where('user_id',Auth::user()->id)
        // ->get();
        $homestay = Homestay::where('user_id',Auth::user()->id)->get();
        $homestayforPartner = array();
        foreach ($homestay as $homestayVal){
            array_push($homestayforPartner, $homestayVal->id);
        };

    
        $product = Product::whereIn('homestay_id',$homestayforPartner)->get();
        // dd($product);
        
        return view ('partner.room.list-room',compact('product'));
    }

    public function getAddRoom(){
        $id = Auth::user()->id;
        // dd($id);
        $homestay = Homestay::where('user_id',$id)->get();
        // dd($listproduct);
        $product = Product::all();
        $room_type = RoomType::all();
        $Tienich = Utilities::all();

        // dd($roomtype);
        return view ('partner.room.add-room',
        ['homestay'=>$homestay,
        'product'=>$product,
        'types'=>$room_type,
        'tienichs'=>$Tienich
        ]);
    }
    public function postAddRoom(Request $request){
        if($request->hasFile('avatar')){

            $image = $request->file('avatar');
            $image_size = $image->getSize();
            $image_ext = $image->getClientOriginalExtension();
            $new_image_name = "uploads/room/"."avatar".rand(1,99999).".".$image_ext;

            $destination_path = public_path('/uploads/room');
            $image->move($destination_path,$new_image_name);

            $request->avatar = $new_image_name;

        }else
        {
            return back()->with('thongbao','Thêm ảnh không thành công');
        }

        
       
        $product = Product::create([
            'homestay_id'=>$request->homestay_id,
            'status'=>$request->status,
            'avatar'=>$request->avatar ,
            'name'=>$request->name,
            'room_type_id'=>$request->room_type_id,
            'prices'=>$request->prices,
            'discount'=>$request->discount,
            'description'=>$request->description
        ]);
        foreach($request->input('tienich') as $tienich){
            Uti_Pro::create([
                'product_id'=>$product->id,
                'utilities_id'=>$tienich
            ]);
        }

        return back()->withInput()->with('thongbao','Thêm phòng thành công');
                
    }
    public function getEditPartnerRoom($id){
        $id = Auth::user()->id;
        // dd($id);
        $homestay = Homestay::where('user_id',$id)->get();        
        $product = Product::all();

        dd($product->homestay_id);
        $room_type = RoomType::all();
        $Tienich = Utilities::all();
        return view ('partner.room.edit-list-room',
        ['homestay'=>$homestay,
        'product'=>$product,
        'types'=>$room_type,
        'tienichs'=>$Tienich
        ]);

    }

}

