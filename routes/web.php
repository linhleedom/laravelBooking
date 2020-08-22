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

Route::group(['namespace'=>'Partner', 'prefix'=>'partner/'],function(){
    Route::group(['prefix'=>'/','middleware'=>'CheckLogedIn'],function(){
        Route::get('login-partner','LoginPartnerController@getDangNhapPartner');
        Route::post('login-partner','LoginPartnerController@postDangNhapPartner');
    });

    Route::group(['prefix'=>'register-partner','middleware'=>'CheckLogedIn'],function(){
        Route::get('/','LoginPartnerController@getDangKyPartner'); 
        Route::post('/','LoginPartnerController@postDangKyPartner');
    });


    

    Route::group(['prefix'=>'/','middleware'=>'CheckLogedOut'],function(){
        Route::get('trangchu','HomePartnerController@getHomePartner');
        
        Route::get('logout','HomePartnerController@getLogout');

        Route::group(['prefix'=>'/'],function(){
            Route::get('/home-add','HomestayPartnerController@getHomeAdd');
            Route::get('/list-homestay','HomestayPartnerController@getListPartnerHomestay');
            Route::get('/list-room','RoomController@getListRoom');
            


            Route::get('/add-homestay','HomestayPartnerController@getAddPartnerHomestay');  
            Route::post('/add-homestay','HomestayPartnerController@postAddPartnerHomestay');          
            Route::get('/getdistricts/{id}','HomestayPartnerController@getdistricts');
            Route::get('/getwards/{id}','HomestayPartnerController@getwards');

            Route::get('upload_images/{id}','HomestayPartnerController@create');
            Route::post('upload_images/{id}','HomestayPartnerController@Upload');           
            Route::get('/delete_image/{id}','HomestayPartnerController@getDeleteImagesHomestay'); 
             
            Route::get('/add-room','RoomController@getAddRoom');  
            Route::post('/add-room','RoomController@postAddRoom'); 
            Route::get('/edit-list-room/{id}','RoomController@getEditPartnerRoom');    
            Route::post('/edit-list-room/{id}','RoomController@postEditPartnerRoom'); 
            

            Route::get('/edit-list-homestay/{id}','HomestayPartnerController@getEditPartnerHomestay');    
            Route::post('/edit-list-homestay/{id}','HomestayPartnerController@postEditPartnerHomestay');           
            Route::get('/delete-homestay/{id}','HomestayPartnerController@getDeletePartnerHomestay');  

            Route::get('/view-homestay/{id}','HomestayPartnerController@getViewPartnerHomestay');       

            // Route::get('/getprovinces','HomestayPartnerController@getEditprovinces');
            // Route::get('/getdistricts/{id}','HomestayPartnerController@getdistricts');
            // Route::get('/getwards/{id}','HomestayPartnerController@getwards');
    });
    });
});