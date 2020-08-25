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

    // $district = App\Ward::find(1)->district->toArray();
    // echo "<Pre>";
    // print_r($district);
    // echo $district['name'];
    
    // $province = App\Address::find(5)->province->toArray();
    // echo "<Pre>";
    // print_r($province);
});
Route::get('/',[
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

// Route::get('/index', function () {
//     return view('partner/master');
// });


Route::group(['namespace'=>'Partner'],function(){

    Route::group(['prefix'=>'/'],function(){
        Route::get('login-and-register','LoginController@getLogin');
        Route::post('login-and-register','LoginController@postLogin');
    });

    Route::group(['prefix'=>'/'],function(){
        Route::get('login-and-register','PageController@getLogout');
    });


});

Route::group(['prefix'=>'/'],function(){
    Route::get('index','PageController@getIndex');
});

// Route::get('/index',[
//     'as' =>'trang-chu',
//     'uses' => 'PageController@getIndex'
// ]);

Route::get('homestay',[
    'as' =>'homestay',
    'uses' => 'PageController@getHomestay'
]);

Route::get('room',[
    'as' =>'room',
    'uses' =>'PageController@getRoom'
]);

Route::get('home-add',[
    'as' => 'thêm homestay và phòng',
    'uses' => 'PageController@getHome_add'
]);

Route::get('add-homestay',[
    'as' => 'add-homestay',
    'uses' => 'PageController@getAdd_homestay'
]);

Route::get('add-room',[
    'as' => 'add-room',
    'uses' => 'PageController@getAdd_room'
]);

Route::get('Edit-detail-booking',[
    'as' => 'Edit-detail-booking',
    'uses' => 'PageController@getEdit_detail_booking'
]);

Route::get('Edit-list-homestay',[
    'as' => 'Edit-list-homestay',
    'uses' => 'PageController@getEdit_list_homestay'
]);

Route::get('edit-list-room',[
    'as' => 'edit-list-room',
    'uses' => 'PageController@getEdit_list_room'
]);

Route::get('list-homestay',[
    'as' => 'list-homestay',
    'uses' => 'PageController@getList_homestay'
]);

Route::get('list-mybooking',[
    'as' => 'list-mybooking',
    'uses' => 'PageController@getList_mybooking'
]);

Route::get('list-room',[
    'as' => 'list-room',
    'uses' => 'PageController@getList_room'
]);

Route::get('my-detail-booking',[
    'as' => 'my-detail-booking',
    'uses' => 'PageController@getMy_detail_booking'
]);

Route::get('pays-home',[
    'as' => 'pays-home',
    'uses' => 'PageController@getPays_home'
]);

Route::get('pays-new-step1',[
    'as' => 'pays-new-step1',
    'uses' => 'PageController@getPays_new_step1'
]);

Route::get('pays-new-step2',[
    'as' => 'pays-new-step2',
    'uses' => 'PageController@getPays_new_step2'
]);

Route::get('pays-new-step3',[
    'as' => 'pays-new-step3',
    'uses' => 'PageController@getPays_new_step3'
]);

Route::get('login-and-register',[
    'as' => 'login-and-register',
    'uses' => 'PageController@getLogin_and_Register'
]);

Route::get('reset-pass-step1',[
    'as' => 'reset-pass-step1',
    'uses' => 'PageController@getReset_Pass_step1'
]);

Route::get('reset-pass-step2',[
    'as' => 'reset-pass-step2',
    'uses' => 'PageController@getReset_Pass_step2'
]);

Route::get('reset-pass-step3',[
    'as' => 'reset-pass-step3',
    'uses' => 'PageController@getReset_Pass_step3'
]);



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

        Route::get('tienich','HomeStayController@getTienIch');
        Route::post('tienich','HomeStayController@postTienIch');

        Route::get('roomstyle','HomeStayController@getRoomStyle');
        Route::post('roomstyle','HomeStayController@postRoomStyle');

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