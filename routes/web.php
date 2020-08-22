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

Route::get('/', [
    'as'=>'userHomePage',
    'uses'=>'user\HomeController@index'
]);
Route::get('/home', [
    'as'=>'userHomePage',
    'uses'=>'user\HomeController@index'
]);
Route::get('/autoComplete', [
    'as'=>'userAutoComplete',
    'uses'=>'user\HomeController@autoComplete'
]);
Route::get('/search', [
    'as'=>'userSearch',
    'uses'=>'user\SearchResultController@index'
]);
Route::get('/room-detail', [
    'as'=>'userRoomDetail',
    'uses'=>'user\RoomDetailController@index'
]);
Route::post('/register',[
    'as'=>'registerUser',
    'uses'=>'user\Auth\RegisterUserController@postRegister'
]);
Route::post('/login',[
    'as'=>'loginUser',
    'uses'=>'user\Auth\LoginUserController@postLogin',
]);
Route::get('/logout',[
    'as'=>'logoutUser',
    'uses'=>'user\Auth\LoginUserController@getLogout'
]);
Route::get('/blog',[
    'as'=>'userBlog',
    'uses'=>'user\BlogController@index'
]);
Route::get('/blog-detail',[
    'as'=>'userBlogDetail',
    'uses'=>'user\BlogDetailController@index'
]);
Route::get('/hot-deal',[
    'as'=>'userHotDeal',
    'uses'=>'user\HotDealController@index'
]);
Route::group(['prefix'=>'/my-account','middleware' => 'checkIdUser'], function(){
    Route::get('/{id}',[
        'as'=>'userAccount',
        'uses'=>'user\AccountController@index'
    ]);
    Route::post('/edit-name/{id}',[
        'as'=>'userEditName',
        'uses'=>'user\AccountController@editName'
    ]);
    Route::post('/edit-email/{id}',[
        'as'=>'userEditEmail',
        'uses'=>'user\AccountController@editEmail'
    ]);
    Route::post('/edit-password/{id}',[
        'as'=>'userEditPassword',
        'uses'=>'user\AccountController@editPassword'
    ]);
    Route::post('/edit-phone/{id}',[
        'as'=>'userEditPhone',
        'uses'=>'user\AccountController@editPhone'
    ]);
    Route::post('/edit-avatar/{id}',[
        'as'=>'userEditAvatar',
        'uses'=>'user\AccountController@editAvatar'
    ]);
    Route::post('/edit-address/{id}',[
        'as'=>'userEditAddress',
        'uses'=>'user\AccountController@editAddress'
    ]);
});
Route::get('/get-district/{id}',[
    'as'=>'userGetDistrict',
    'uses'=>'user\AccountController@getDistrict'
]);
Route::get('/get-ward/{id}',[
    'as'=>'userGetWard',
    'uses'=>'user\AccountController@getWard'
]);
Route::get('/error',[
    'as'=>'userError',
    'uses'=>'user\HomeController@getError'
]);



