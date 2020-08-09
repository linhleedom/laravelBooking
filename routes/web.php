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

Route::group(['namespace'=>'Partner'],function(){
    Route::group(['prefix'=>'/','middleware'=>'CheckLogedIn'],function(){
        Route::get('login-partner','LoginPartnerController@getDangNhapPartner');
        Route::post('login-partner','LoginPartnerController@postDangNhapPartner');
    });

    Route::group(['prefix'=>'register-partner','middleware'=>'CheckLogedIn'],function(){
        Route::get('/','LoginPartnerController@getDangKyPartner'); 
        Route::post('/','LoginPartnerController@postDangKyPartner');
    });

    Route::get('logout','HomePartnerController@getLogout');

    Route::group(['prefix'=>'/','middleware'=>'CheckLogedOut'],function(){
        Route::get('trangchu','HomePartnerController@getHomePartner');

        Route::group(['prefix'=>'partner'],function(){
            Route::get('/list-homestay','HomestayPartnerController@getListPartnerHomestay'); 
            Route::get('/add-homestay','HomestayPartnerController@getAddPartnerHomestay');  
            Route::post('/add-homestay','HomestayPartnerController@postAddPartnerHomestay');  

            Route::get('/form', 'HomestayPartnerController@showForm');
            Route::post('/showProvinceInDistrict', 'DistrictController@showProvinceInDistrict');

            Route::get('/edit-homestay/{id}','HomestayPartnerController@getEditPartnerHomestay');              
            Route::get('/view-homestay/{id}','HomestayPartnerController@getViewPartnerHomestay');              
            Route::get('/delete-homestay/{id}','HomestayPartnerController@getDeletePartnerHomestay');  

            Route::get('/getprovinces','HomestayPartnerController@getprovinces');
            Route::get('/getdistricts/{id}','HomestayPartnerController@getdistricts');
            Route::get('/getwards/{id}','HomestayPartnerController@getwards');
    });
    });
});