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
use App\ImageProduct;

class RoomController extends Controller
{
    public function getListRoom(Request $request){
        $homestay_id = $request->id;
        $product = Product::where('homestay_id',$homestay_id)->paginate(12);
        $roomrestore = Product::where('homestay_id',$homestay_id)->onlyTrashed()->get();
        return view ('partner.room.list-room',compact('product','homestay_id','roomrestore'));
    }

    public function getAddRoom(Request $request){
        $homestay = Homestay::where('id',$request->id)->firstOrFail();
        $types = RoomType::all();
        $tienichs = Utilities::all();
        return view ('partner.room.add-room',compact('types','tienichs','homestay'));
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
        return redirect()->route('UploadImageRoom',['id'=>$product->id])->with(['thongbao'=>'success','massage'=>'Thêm phòng thành công !']);
                
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
        foreach($request->input('tienich') as $tienich){
            Uti_Pro::create([
                'product_id'=>$product->id,
                'utilities_id'=>$tienich
            ]);
        }
        return redirect()->back()->with(['thongbao'=>'success','massage'=>'Cập nhật thành công !']);
    }
    public function getDeleteRoom($id){
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        return redirect()->back()->with(['thongbao'=>'fail','massage'=>'Bạn vừa xóa 1 phòng !']);
    }
    //upload img Room
    public function createImage($id){
        
        $product = Product::find($id);
        return view ('partner.room.add-image-room',
        ['product'=>$product]
    );
    }
    public function UploadImage(Request $request,$id){
       
        $product = Product::find($id);

        // dd($homestay);
        $ImageHomestay = ImageProduct::all();
        if($request->hasFile('url')){
            //Xử lý upload Ảnh
            $image_array = $request->file('url');
            $array_len = count($image_array);

            $id = Product::where('id','user_id')->get();
            

            for($i=0;$i<$array_len;$i++)
            {   
                $image_size = $image_array[$i]->getSize();
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                
                $new_image_name = "uploads/room/".rand(1,99999).".".$image_ext;

                $destination_path = public_path('/uploads/room');
               
                $image_array[$i]->move($destination_path,$new_image_name);
                $table = new ImageProduct;
                $table->url= $new_image_name;
                $table->product_id = $request->id;
                $table->save();

            }                       
            return redirect()->back()->with(['thongbao'=>'success','massage'=>'Thêm ảnh thành công']);
        }else {            
            return redirect()->back()->with(['thongbao'=>'fail','massage'=>'Hãy chọn nhiều file ảnh ']);
        }
    }
    public function get_search(Request $request){
        $product = Product::where('name','like','%'.$request->search.'%')->where('status',1)->get();
        return view ('partner.room.list-room',[
            'product'=> $product
        ]);
    }

    //Xóa ảnh

    public function getDeleteImagesRoom($id)
    {
        $deleteRoom = Product::find($id);
        $deleteRoom->delete();

        return redirect()->back()->with(['thongbao'=>'success','massage'=>'Bạn vừa xóa 1 phòng !']);
    }

    public function getDeleteAvatarRoom($id)
    {
        $avatarRoom = Product::find($id);
        if(empty($avatarRoom->avatar = "")){
            $avatarRoom->avatar = "";
            $avatarRoom->update();
        }
        return redirect()->back()->with(['thongbao'=>'success','massage'=>'Xóa avatar Room thành công']);
    }
    //end upload img
    public function getRestorePartnerRoom($id)
    {
        $room_restore = Product::withTrashed()->find($id);
        $room_restore->restore();
        return redirect()->back()->with(['thongbao'=>'success','massage'=>'Bạn vừa khôi phục 1 phòng']);
    }

}

