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

    // $product = App\Utilities::find(1)->product->toArray();
    // echo "<pre>";
    // print_r($product);
    // $room_type = $product[0]['id'];
    // $roomType = App\Product::find($room_type)->roomType->toArray();
    // echo $roomType['name'];

    // $district = App\Address::find(1)->district->toArray();
    // echo "<Pre>";
    // print_r($district);
    // $province = App\Address::find(5)->province->toArray();
    // echo "<Pre>";
    // print_r($province);
});
Route::get('home',[
    'as'=>'homePage',
    'uses'=>'PageController@getHome'
]);
Route::get('blog',[
    'as'=>'blogPage',
    'uses'=>'PageController@getBlog'
]);
Route::get('hot-deal',[
    'as'=>'hotDealPage',
    'uses'=>'PageController@getHotDeal'
]);
Route::get('error',[
    'as'=>'errorPage',
    'uses'=>'PageController@getError'
]);
Route::get('search-result',[
    'as'=>'searchResultPage',
    'uses'=>'PageController@getSearchResult'
]);
Route::get('room-detail',[
    'as'=>'roomDetailPage',
    'uses'=>'PageController@getRoomDetail'
]);
Route::get('blog-detail',[
    'as'=>'blogDetailPage',
    'uses'=>'PageController@getBlogDetail'
]);
Route::get('my-account',[
    'as'=>'myAccountPage',
    'uses'=>'PageController@getAccount'
]);
Route::get('terms-of-sevices',[
    'as'=>'termOfSevicePage',
    'uses'=>'PageController@getTermOfSevice'
]);
Route::get('booking-step-1',[
    'as'=>'nookingStep1Page',
    'uses'=>'PageController@getBookingStep1'
]);
Route::get('booking-step-2',[
    'as'=>'bookingStep2Page',
    'uses'=>'PageController@getBookingStep2'
]);
Route::get('booking-step-3',[
    'as'=>'bookingStep3Page',
    'uses'=>'PageController@getBookingStep3'
]);
Route::get('reset-password-step-1',[
    'as'=>'resetPassStep1Page',
    'uses'=>'PageController@getResetPassStep1'
]);
Route::get('reset-password-step-2',[
    'as'=>'resetPassStep2Page',
    'uses'=>'PageController@getResetPassStep2'
]);
Route::get('reset-password-step-3',[
    'as'=>'resetPassStep3Page',
    'uses'=>'PageController@getResetPassStep3'
]);
Route::get('loading',[
    'as'=>'loadingPage',
    'uses'=>'PageController@getLoading'
]);
