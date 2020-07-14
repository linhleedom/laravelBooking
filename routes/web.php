<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function(){
    // $roomType = App\Product::find(2)->roomType->toArray();
    // echo $roomType['name'];
    // $homestay = App\Product::find(2)->homestay->toArray();
    // echo $homestay['name'];
    // $utilities = App\Product::find(1)->utilities->toArray();
    // echo "<pre>";
    // print_r($utilities);
    // echo $utilities[0]['name'];

    $product = App\Utilities::find(1)->product->toArray();
    // echo "<pre>";
    // print_r($product);
    $room_type = $product[0]['id'];
    $roomType = App\Product::find($room_type)->roomType->toArray();
    echo $roomType['name'];

    // $district = App\Address::find(1)->district->toArray();
    // echo "<Pre>";
    // print_r($district);
    $province = App\Address::find(5)->province->toArray();
    echo "<Pre>";
    print_r($province);
});
