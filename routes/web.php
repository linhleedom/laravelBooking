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

Route::group(['prefix'=>''],function(){
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
        // 'middleware'=>'checkLogin',
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
    Route::get('/add-cart/{id}',[
        'as'=>'userAddCart',
        'uses'=>'user\CartController@addCart'
    ]);
    
});


Route::group(['namespace'=>'Partner', 'prefix'=>'partner/'],function(){
    Route::group(['prefix'=>'/'],function(){
        Route::get('login-partner','LoginPartnerController@getDangNhapPartner');
        Route::post('login-partner','LoginPartnerController@postDangNhapPartner');
    });

    Route::group(['prefix'=>'register-partner'],function(){
        Route::get('/','LoginPartnerController@getDangKyPartner'); 
        Route::post('/','LoginPartnerController@postDangKyPartner');
    });

    Route::group(['prefix'=>'/','middleware'=>'CheckLogedIn'],function(){
        
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

            Route::get('/list-bills','BillsController@getListBills'); 
            Route::get('/information-order/{id}','OrderController@getInfoOrder');
            

            Route::get('/edit-list-homestay/{id}','HomestayPartnerController@getEditPartnerHomestay');    
            Route::post('/edit-list-homestay/{id}','HomestayPartnerController@postEditPartnerHomestay');           
            Route::get('/delete-homestay/{id}','HomestayPartnerController@getDeletePartnerHomestay');  

            Route::get('/view-homestay/{id}','HomestayPartnerController@getViewPartnerHomestay');;        
            // Route::get('/getprovinces','HomestayPartnerController@getEditprovinces');
            // Route::get('/getdistricts/{id}','HomestayPartnerController@getdistricts');
            // Route::get('/getwards/{id}','HomestayPartnerController@getwards');
        });
    });
});
Route::get('admin/dangnhap','KhachHangController@getLogin');
Route::post('admin/dangnhap','KhachHangController@postLogin');
Route::get('admin/logout','KhachHangController@getLogout');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    Route::group(['prefix'=>'booking'],function(){
        //admin/booking/danhsach
        Route::get('danhsach','BookingController@getDanhSach');

        Route::get('detail','BookingController@getDetail');

        Route::get('edit/{id}','BookingController@getEdit');
        Route::post('edit/{id}','BookingController@postEdit');
    });


    Route::group(['prefix'=>'khachhang'],function(){
        //admin/booking/danhsach
        Route::get('danhsach','KhachHangController@getDanhSach');

        Route::get('them','KhachHangController@getThem');
        Route::post('them','KhachHangController@postThem');

        Route::get('edit/{id}','KhachHangController@getEdit');
        Route::post('edit/{id}','KhachHangController@postEdit');

        Route::get('delete/{id}','KhachHangController@getDelete');

        Route::get('detail','KhachHangController@getDetail');

        Route::get('detailstay','KhachHangController@getDetailStay');

        Route::get('dshomestay','KhachHangController@getDSHomeStay');
    });

    Route::group(['prefix'=>'login'],function(){
        //admin/booking/danhsach
        Route::get('login','LoginController@getLogin');
        Route::get('loginagain','LoginController@getLoginAgain');
    });

    Route::group(['prefix'=>'QLBlog'],function(){
        //admin/booking/danhsach
        Route::get('danhsach','QLBlogController@getDanhSach');

        Route::get('detail/{id}','QLBlogController@getDetail');

        Route::get('edit/{id}','QLBlogController@getEdit');
        Route::post('edit/{id}','QLBlogController@postEdit');

        Route::get('delete/{id}','QLBlogController@getDelete');
    });


    Route::group(['prefix'=>'QLSlide'],function(){
        //admin/booking/danhsach
        Route::get('danhsach','QlSlideController@getDanhSach');

        Route::get('edit/{id}','QLSlideController@getEdit');
        Route::post('edit/{id}','QLSlideController@postEdit');

        Route::get('delete/{id}','QLSlideController@getDel');
    });

    Route::group(['prefix'=>'/'],function(){
        //admin/booking/danhsach
        Route::get('dashboard','DBController@getDashBoard');
    });

    Route::group(['prefix'=>'/'],function(){
        //admin/booking/danhsach
        Route::get('thembai','TBController@getThemBai');
        Route::post('thembai','TBController@postThemBai');
    });

    Route::group(['prefix'=>'/'],function(){
        Route::get('themslide','TSController@getTS');
        Route::post('themslide','TSController@postTS');
    });
});