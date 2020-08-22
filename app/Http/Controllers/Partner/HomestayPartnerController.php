<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Partner\Homestay;
use App\Http\Requests\Partner\AddHomestay;
use App\District;
use App\Province;
use App\Ward;

class HomestayPartnerController extends Controller
{
    
    public function getListPartnerHomestay()
    {
        $data1['homestaylist'] = Homestay::all();
        return view ('partner.homestay.list-homestay',$data1);
    }

    public function getAddPartnerHomestay(){
        return view ('partner.homestay.add-homestay');
    }

    public function postAddPartnerHomestay(AddHomestay $request){
    }

    
    public function getViewPartnerHomestay(){

    }

    public function getEditPartnerHomestay()
    {
        // return view ('partner.homestay.edit-list-homestay');
    }
    public function getDeletePartnerHomestay()
    {

    }

    public function getprovinces()
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
}
