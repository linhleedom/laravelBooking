<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Homestay;
use App\District;
use App\Province;
use App\Ward;
use DB;
use App\Product;
use App\ImageHomestay;

class HomestayPartnerController extends Controller
{
    public function getHomeAdd(){
        return view('partner.home-add');
    }
    
    public function getListPartnerHomestay()
    {
        $data1['homestaylist'] = Homestay::where('user_id',Auth::user()->id)->get();
        // dd($data1);
        return view ('partner.homestay.list-homestay',$data1);
    }

    
    public function getViewPartnerHomestay(){

    }

    //upload Ảnh
    public function create($id){
        
        $homestay = Homestay::find($id);
        return view ('partner.homestay.add-Image-homestay',
        ['homestay'=>$homestay]
    );
    }
    
    public function Upload(Request $request,$id){
       
        $homestay = Homestay::find($id);

        // dd($homestay);
        $ImageHomestay = ImageHomestay::all();
        if($request->hasFile('url')){
            //Xử lý upload Ảnh
            $image_array = $request->file('url');
            $array_len = count($image_array);

            $id = Homestay::where('id','user_id')->get();
            

            for($i=0;$i<$array_len;$i++)
            {   
                $image_size = $image_array[$i]->getSize();
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                
                $new_image_name = "uploads/homestay/".rand(1,99999).".".$image_ext;

                $destination_path = public_path('/uploads/homestay');
               
                $image_array[$i]->move($destination_path,$new_image_name);
                $table = new ImageHomestay;
                $table->url= $new_image_name;
                $table->homestay_id = $request->id;
                $table->save();

            }           
            return back()->with('thongbao','Thêm ảnh thành công');
        }else {
            return back()->with('thongbao','Hãy chọn nhiều file ảnh');
        }
    }

    //Xóa ảnh

    public function getDeleteImagesHomestay($id)
    {
        ImageHomestay::destroy($id);
        return back();
    }
    //end Upload ảnh
    
    //Add Homestay
    public function getAddPartnerHomestay(){
        $provinces = Province::all();
        $product = Product::all();
        $homestay = Homestay::all();
        return view('partner.homestay.add-homestay', 
        ['homestay'=>$homestay,
        'product'=>$product,
        'provinces'=>$provinces]);
    }


    public function postAddPartnerHomestay(Request $request){
        
        $homestay = new Homestay() ;
        // if(){
            

        // }else {
        //     return back()->with('thongbao','Lỗi thêm');
        // }
        if($request->isMethod('post') && $request->hasFile('avatar')){

            $image = $request->file('avatar');
            $image_size = $image->getSize();
             $image_ext = $image->getClientOriginalExtension();
            $new_image_name = "uploads/homestay/"."avatar".rand(1,99999).".".$image_ext;

            $destination_path = public_path('/uploads/homestay');
            $image->move($destination_path,$new_image_name);

            $homestay->avatar = $new_image_name;
            
            $homestay->name=$request->name;
            $homestay->user_id= Auth::user()->id;
            $homestay->matp=$request->matp;
            $homestay->maqh =$request->maqh ;
            $homestay->xaid=$request->xaid ;
            $homestay->description=$request->description;
            $homestay->status=$request->status;

            $homestay->save();
            return back()->withInput()->with('thongbao','Thêm Homestay thành công');
        }
        else
        {
            return back()->withInput()->with('thongbao','Thêm không thành công');
        }
    }

    public function getEditprovinces()
    {   
        $provinces = Province::all();
        return view('partner.homestay.edit-list-homestay', compact('provinces'));
    }

    //For fetching states
    public function getdistricts($id)
    {
        $districts = \DB::table("districts")
                    ->where("matp",$id)
                    ->pluck("name","maqh");
        return response()->json($districts);
    }

    //For fetching cities
    public function getwards($id)
    {
        $wards= \DB::table("wards")
                    ->where("maqh",$id)
                    ->pluck("name","xaid");
        return response()->json($wards);
    }
    // End of Homestay

    public function getEditPartnerHomestay($id)
    {
        $homestay = Homestay::find($id);
        $provinces = Province::find($id);
        $provinces = Province::all();
        $district = District::all();
        $ward = Ward::all();

        // foreach ($district->name as $maqh){ 
        //     echo $maqh.'<br />';
        // }
        return view ('partner.homestay.edit-list-homestay',['homestay'=>$homestay],compact('provinces','district','ward'));
    }

    public function postdistricts($id)
    {
        $districts = \DB::table("districts")
                    ->where("matp",$id)
                    ->pluck("name","maqh");
        return response()->json($districts);
    }

    //For fetching cities
    public function postwards($id)
    {
        $wards= \DB::table("wards")
                    ->where("maqh",$id)
                    ->pluck("name","xaid");
        return response()->json($wards);
    }

    public function postEditPartnerHomestay(Request $request,$id){


        $homestay = Homestay::find($id);

        $homestay->name = $request->name;
        $homestay->matp = $request->provinces;
        $homestay->maqh = $request->district;
        $homestay->xaid = $request->ward;
        $homestay->description = $request->description;
        $homestay->status = $request->status;
        
        // dd($homestay);
        $homestay->save();
        // return redirect('partner/list-homestay');


        return redirect()->intended('partner/list-homestay')->with('Thongbao','Sửa thành công');

    }
    public function getDeletePartnerHomestay($id)
    {
        Homestay::destroy($id);
        return back();
    }
    

    
}
