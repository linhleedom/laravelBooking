<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
use App\Homestay;
use App\District;
use App\Province;

class HomeController extends Controller
{
    public function index(){

        $slide = Slide::where('status', '1')->get();
        
        $homestayTopRate = Homestay::where('status', '1')->orderBy('point', 'DESC')->take(8)->get();
        $homestay = Homestay::where('status', '1')->take(8)->get();
        
        return view('user.pages.home', compact('slide','homestay','homestayTopRate'));
    }

    public function autoComplete(Request $request){
        $term = $request->get('term');
        $district = District::select('name')->where('name', 'like', '%'.$term.'%')->get();
        $province = Province::select('name')->where('name', 'like', '%'.$term.'%')->get();

        $nameDistrict = array();
        foreach($district as $districtVal){
            array_push($nameDistrict,$districtVal['name']);
        };
        // $nameProvince = array();
        // foreach($province as $provinceVal){
        //     array_push($nameProvince,$provinceVal['name']);
        // };
        // $name = array_merge($nameDistrict, $nameProvince);
        return json_encode($nameDistrict);
    }
}
