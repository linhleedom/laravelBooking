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
Route::get('/search-room-ajax', [
    'as'=>'userSearchRoomAjax',
    'uses'=>'user\RoomDetailController@searchRoomAjax'
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
    Route::post('/rating/{id}/{bill_id}',[
        'as'=>'userRating',
        'uses'=>'user\AccountController@rating'
    ]);
    Route::get('/cancel-booking/{id}/{bill_id}',[
        'as'=>'userCancelBooking',
        'uses'=>'user\AccountController@cancelBooking'
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
Route::get('/delete-item-cart/{id}',[
    'as'=>'userDeleteItemCart',
    'uses'=>'user\CartController@deleteItemCart'
]);
Route::get('/booking-step-1',[
    'as'=>'userBookingStep1',
    'uses'=>'user\BookingController@bookingStep1'
]);
Route::post('/booking-step-2',[
    'as'=>'userBookingStep2',
    'uses'=>'user\BookingController@bookingStep2'
]);
Route::get('/booking-step-3/{id}',[
    'as'=>'userBookingStep3',
    'uses'=>'user\BookingController@bookingStep3'
]);
Route::get('/search-filter',[
    'as'=>'userSearchFilter',
    'uses'=>'user\SearchResultController@filter'
]);
Route::get('/search-orderBy',[
    'as'=>'userSearchOrderBy',
    'uses'=>'user\SearchResultController@orderBy'
]);
Route::get('/reset-password',[
    'as'=>'userResetPassword',
    'uses'=>'user\ResetPasswordController@resetPasswordStep1'
]);
Route::post('/reset-password-post',[
    'as'=>'userResetPasswordPost',
    'uses'=>'user\ResetPasswordController@resetPasswordStep1Post'
]);
Route::get('/reset-password/{token}',[
    'as'=>'userResetPasswordStep2',
    'uses'=>'user\ResetPasswordController@resetPasswordStep2'
]);
Route::post('/reset-password-2-post',[
    'as'=>'userResetPasswordStep2Post',
    'uses'=>'user\ResetPasswordController@resetPasswordStep2Post'
]);
Route::get('/conditions',[
    'as'=>'userConditions',
    'uses'=>'user\HomeController@conditions'
]);




Route::group(['namespace'=>'Partner', 'prefix'=>'partner/'],function(){
    Route::group(['prefix'=>'/'],function(){
        Route::get('login-partner','LoginPartnerController@getDangNhapPartner');
        Route::post('login-partner','LoginPartnerController@postDangNhapPartner');
    });

    Route::group(['prefix'=>'register-partner'],function(){
        Route::get('/','LoginPartnerController@getDangKyPartner')->name('partnerRegister'); 
        Route::post('/','LoginPartnerController@postDangKyPartner');
    });

    Route::group(['prefix'=>'/','middleware'=>'CheckLogedIn'],function(){
        
        Route::get('trangchu','HomePartnerController@getHomePartner')->name('trangchu');
        
        Route::get('logout','HomePartnerController@getLogout');

        Route::group(['prefix'=>'/'],function(){
            Route::get('/list-homestay','HomestayPartnerController@getListPartnerHomestay')->name('list-homestay');
            Route::get('/list-room/{id}','RoomController@getListRoom')->name('list-room');
            


            Route::get('/add-homestay','HomestayPartnerController@getAddPartnerHomestay')->name('addHomestay');  
            Route::post('/add-homestay','HomestayPartnerController@postAddPartnerHomestay');          
            Route::get('/getdistricts/{id}','HomestayPartnerController@getdistricts');
            Route::get('/getwards/{id}','HomestayPartnerController@getwards');

            Route::get('upload_images/{id}','HomestayPartnerController@create')->name('UploadImageHomestay');
            Route::post('upload_images/{id}','HomestayPartnerController@Upload');           
            Route::get('/delete_image/{id}','HomestayPartnerController@getDeleteImagesHomestay')->name('delete_image');
            Route::get('/delete_avatar_homestay/{id}','HomestayPartnerController@getDeleteAvatarHomestay')->name('delete_avatar_homestay'); 
            
            Route::get('upload_images_room/{id}','RoomController@createImage')->name('UploadImageRoom');
            Route::post('upload_images_room/{id}','RoomController@UploadImage');           
            Route::get('/delete_image_room/{id}','RoomController@getDeleteImagesRoom')->name('delete_image_room'); 
            Route::get('/delete_avatar_room/{id}','RoomController@getDeleteAvatarRoom')->name('delete_avatar_room'); 

            Route::get('/add-room/{id}','RoomController@getAddRoom')->name('addRoom');  
            Route::post('/add-room','RoomController@postAddRoom')->name('addRoomPost'); 
            Route::get('/edit-list-room/{id}','RoomController@getEditPartnerRoom');    
            Route::post('/edit-list-room/{id}','RoomController@postEditPartnerRoom');            
            Route::get('/delete-room/{id}','RoomController@getDeleteRoom')->name('delete_room'); 

            Route::get('/list-bills','BillsController@getListBills')->name('list_bills'); 
            Route::get('/information-order/{id}','OrderController@getInfoOrder')->name('information_order');
            Route::get('/edit-order/{id}','OrderController@getEditOrder');
            Route::post('/edit-order/{id}','OrderController@postEditOrder');
            Route::get('/edit-bill/{id}','BillsController@getEditbill');
            Route::post('/edit-bill/{id}','BillsController@postEditbill'); 

            Route::get('/total-revenue','RevenueController@index')->name('total_revenue'); 
            Route::get('/get-time-bill','RevenueController@getTime')->name('partnerGetTimeBill');
            
            
            Route::get('/total-loyal-customers','LoyalCustomersController@index')->name('total_loyal_customers');
            Route::get('/homestay_search','SearchHomestayController@index');
            Route::get('/search', 'SearchHomestayController@search');  
            
            Route::get('Cancel-room/{id}',[
                'as'=>'CancelBook',
                'uses'=>'BillsController@getCancelBook'
            ]);
            

            Route::get('/edit-list-homestay/{id}','HomestayPartnerController@getEditPartnerHomestay');
            Route::post('/edit-list-homestay/{id}','HomestayPartnerController@postEditPartnerHomestay');
            Route::get('/delete-homestay/{id}','HomestayPartnerController@getDeletePartnerHomestay')->name('delete_homestay');
            Route::get('/view-restore-homestay','HomestayPartnerController@getViewRestorePartnerHomestay')->name('View_Restore_homestay');
            Route::get('/restore-homestay/{id}','HomestayPartnerController@getRestorePartnerHomestay')->name('Restore_homestay');
            Route::get('/view-homestay/{id}','HomestayPartnerController@getViewPartnerHomestay');

            
            Route::get('/pays-homestay/{id}','HomestayPartnerController@getPaysHomestay')->name('PaysHomestay');             
            Route::get('/pays-homestay/{id}','HomestayPartnerController@getPaysHomestay2')->name('PaysHomestayStep2');

            Route::group(['prefix'=>'/'], function(){
                
                Route::get('/my-account/{id}','AccountController@index');
                Route::post('/edit-name/{id}','AccountController@editName')->name('userEdit_Name');
                Route::post('/edit-email/{id}','AccountController@editEmail')->name('userEdit_Email');
                Route::post('/edit-password/{id}','AccountController@editPassword')->name('userEdit_Password');                
                Route::post('/edit-phone/{id}','AccountController@editPhone')->name('userEdit_Phone');       
                Route::post('/edit-avatar/{id}','AccountController@editAvatar')->name('userEdit_Avatar');
                Route::post('/edit-address/{id}','AccountController@editAddress')->name('userEdit_Address');

                Route::get('/edit-address/{id}','AccountController@editAddress');               
                Route::get('/change-status/{bill_id}',[
                    'as'=>'ChangeStatus',
                    'uses'=>'AccountController@getChange'
                ]);
            });             
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

        Route::get('listorder/{id}','BookingController@getListOrder');

       
    });

    Route::group(['prefix'=>'homestay'],function(){
        Route::get('ListHT','HomeStayController@getListHST');

        Route::get('products/{id}','HomeStayController@getHomeStay');
        
        Route::get('edit/{id}','HomeStayController@getEdit');
        Route::post('edit/{id}','HomeStayController@postEdit');

        Route::get('DStienich','HomeStayController@getDStienich');
        Route::get('tienich','HomeStayController@getTienIch');
        Route::post('tienich','HomeStayController@postTienIch');
        Route::get('editTI/{id}','HomeStayController@getEditTI');
        Route::post('editTI/{id}','HomeStayController@postEditTI');
        Route::get('xoaTI/{id}','HomeStayController@getDelTI');

        Route::get('DSroomstyle','HomeStayController@getDSRS');
        Route::get('roomstyle','HomeStayController@getRoomStyle');
        Route::post('roomstyle','HomeStayController@postRoomStyle');
        Route::get('xoaRS/{id}','HomeStayController@getDelRS');

    });

    Route::group(['prefix'=>'khachhang'],function(){
        //admin/booking/danhsach
        Route::get('danhsach','KhachHangController@getDanhSach');

        Route::get('them','KhachHangController@getThem');
        Route::post('them','KhachHangController@postThem');

        Route::get('edit/{id}','KhachHangController@getEdit');
        Route::post('edit/{id}','KhachHangController@postEdit');

        Route::get('delete/{id}','KhachHangController@getDelete');

        Route::get('detail/{id}','KhachHangController@getDetail');

        
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
        Route::get('ajax/them/{matp}','TBController@getmaqh');
    });

    Route::group(['prefix'=>'/'],function(){
        Route::get('themslide','TSController@getTS');
        Route::post('themslide','TSController@postTS');
    });
});