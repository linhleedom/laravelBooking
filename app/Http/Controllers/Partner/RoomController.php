<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Validation\Validator;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Homestay;
use App\Product;
use App\RoomType;
use App\Utilities;
use App\Uti_Pro;

class RoomController extends Controller
{
    public function getListRoom(){
        $homestay = Homestay::where('user_id',Auth::user()->id)->get();
        $homestayforPartner = array();
        foreach ($homestay as $homestayVal){
            array_push($homestayforPartner, $homestayVal->id);
        };
        $product = Product::whereIn('homestay_id',$homestayforPartner)->paginate(12);   
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

        $validatorAdd = Validator::make($request->all(),
            [
                'name'=>'required',
                'homestay_id'=>'required',
                'room_type_id'=>'required',
                'description'=>'required',
                'avatar'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'discount'=>'required',
                'prices'=>'required',
                'area'=>'required',
                'tienich'=>'required'
            ],[
                'name.required'=>'Vui lòng nhập tên Homestay',
                'description.required'=>'Vui lòng mô tả Homestay',
                'avatar.required'=>'Vui lòng thêm ảnh đại diện',
                'avatar.required'=>'Vui lòng chọn 1 ảnh',
                'avatar.image'=>'File không đúng định dạng',
                'avatar.mimes'=>'File ảnh phải có đuôi jpeg,png,ipg,gif',
                'avatar.max'=>'File ảnh dung lượng vượt quá 2Mb',
                'homestay_id.required'=>'Vui lòng chọn tên Homestay',
                'room_type_id.required'=>'Vui lòng chọn loại phòng',
                'discount.required'=>'Vui lòng nhập giảm giá',
                'prices.required'=>'Vui lòng nhập giá phòng',
                'area.required'=>'Vui lòng nhập diện tích căn phòng',
                'tienich.required'=>'Vui lòng chọn tiện ích ',
            ]
            );
        
        if($validatorAdd->fails()){
            return redirect()->back()->withErrors($validatorAdd, 'addHomestay');
        }
        $image = $request->file('avatar');
        $image_size = $image->getSize();
        $image_ext = $image->getClientOriginalExtension();
        $new_image_name = "uploads/room/"."avatar".rand(1,99999).".".$image_ext;
        $destination_path = public_path('/uploads/room');
        $image->move($destination_path,$new_image_name);
        $request->avatar = $new_image_name;
       
        $product = Product::create([
            
            'homestay_id'=>$request->homestay_id,
            'status'=>$request->status,
            'avatar'=>$request->avatar,
            'name'=>$request->name,
            'room_type_id'=>$request->room_type_id,
            'prices'=>$request->prices,
            'discount'=>$request->discount,
            'area'=>$request->area,
            'description'=>$request->description
        ]);
        // dd($product);
        foreach($request->input('tienich') as $tienich){
            Uti_Pro::create([
                'product_id'=>$product->id,
                'utilities_id'=>$tienich
            ]);
        }
        // dd($product);
        return redirect()->back()->with(['thongbao'=>'success','massage'=>'Thêm phòng thành công !']);
                
    }
    public function getEditPartnerRoom($id){
        $product = Product::find($id);
        $homestay = Homestay::where('user_id',Auth::user()->id)->get();

        $utilityIds = $product->utilities->pluck('id')->toArray();

        $room_type = RoomType::all();
        $utilities = Utilities::all();

        // dd($Tienich);
        return view ('partner.room.edit-list-room',
        ['homestay'=>$homestay,
        'utilityIds'=>$utilityIds,
        'utilities'=>$utilities,
        'room_type'=>$room_type,
        'product'=>$product,
        ]);

    }
    public function postEditPartnerRoom(Request $request,$id){
        $product = Product::find($id);

        $uti_pro = Uti_Pro::where('product_id',$product->id);

        $product->homestay_id = $request->homestay_id;
        $product->status = $request->status;
        $product->name = $request->name;
        $product->area = $request->area;
        $product->room_type_id = $request->room_type;
        $product->prices = $request->prices;
        $product->discount = $request->discount;
        $product->description = $request->description;

        if($product->avatar == "" ){
            $image = $request->avatar;
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/room/'), $filename);
            $link = 'uploads/room/'.$filename;
            $product->avatar = $link;
        }

        $product->save();

        $uti_pro->delete();
        // dd($request->input('tienich'));
        foreach($request->input('tienich') as $tienich){
            Uti_Pro::create([
                'product_id'=>$product->id,
                'utilities_id'=>$tienich
            ]);
        }
        return redirect()->back()->with(['thongbao'=>'success','massage'=>'Cập nhật thành công !']);
    }
    public function getDeleteRoom($id){
        Product::destroy($id);
        return back();
    }

}

