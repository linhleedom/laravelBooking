@extends('partner.master')
@section('title')
Add Image Room
@endsection
@section('script')
@endsection
@section('main')
    <!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
                        <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
						<li><a href="{{route('list-room',['id'=>$product->homestay_id])}}" title="ListRoom">Danh sách phòng</a></li> 
						<li>Thêm ảnh cho phòng</li>                               
					</ul> 
					<!--//crumbs-->
					
					<!--top right navigation-->
					<!-- <ul class="top-right-nav">
						<li><a href="#" title="Back to results">Back to results</a></li>
						<li><a href="#" title="Change search">Change search</a></li>
					</ul> -->
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth form-booking">
                <h1 style="text-align: center;text-transform: uppercase;"> Ảnh của phòng  <br><b style="color: lightcoral;font-size:15px"><u>{{$room->name}}</u></b></h1>
                
                <form id="booking" method="post" action="" class="booking " enctype="multipart/form-data">
                        {{csrf_field()}}
						@if(Session::get('thongbao') == 'success')
							<i class="notify-success">{{Session::get('massage')}}</i>
						@endif
						@if(Session::get('thongbao') == 'fail')
							<i class="notify-fail">{{Session::get('massage')}}</i>
						@endif
                        <div colspan="2" 
									style="color: #32df5d;
										/* background-color: #f2dede; */
										border-color: #ebccd1;
										width: 500px;
										height: 50px;
										font-size: 1.5em;
								">
								</div>
						<fieldset>
                            <h3 style="margin-top: 20px;"><span>01</span> Upload Ảnh </h3>
                            <input type="file" name= "url[]" multiple>
                            <br><br>
                            <input type="submit" class="gradient-button" name = "send" value="Upload file" value="Thêm">
						</fieldset>							
					</form>
				</section>
				<section class="three-fourth form-booking">
					<form id="booking" method="post" action="" class="booking " >
						{{csrf_field()}}						
						<!--get inspired list-->
							@foreach ($room->image as $productVal)
							<!--column-->
							<article class="one-fourth img_custom">
								<figure>
									<img src="{{asset('public/'.$imageval->url)}}" alt="" width="270" height="152">							
								</figure>
								<div class="details">
									<h5>{{$homestay->name}}</h5>
								</div>
								<div class="details">
									<a href="{{url('partner/delete_image', ['id'=>$imageval->id])}}"  onclick="return confirm ('Bạn có muốn xóa ảnh')"><img style="float: right" src="partner/images/ico/delete1.png" alt="" width="20" height="20" /></a> 
								</div>
                            </article>
                            <!--column-->
							@endforeach
							<!--//column-->
						<!--//get inspired list-->
					</form>
				</section>
				
				<!--right sidebar-->
				
			</div>
			<!--//main content-->
		</div>
	</div>

@endsection