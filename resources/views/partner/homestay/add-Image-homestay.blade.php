@extends('partner.master')
@section('title')
Add Image Homestay
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
                        <li><a href="{{route('list-homestay')}}" title="list-homestay">Danh sách Homestay</a></li> 
						<li>Thêm ảnh Homestay</li>                               
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
                <h1 style="text-align: center;text-transform: uppercase;">Ảnh của Homestay <br><b style="color: lightcoral;font-size:15px"><u>{{$homestay->name}}</u></b></h1>
                
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
                            <input type="file" name="url[]" multiple>
                            <br><br>
                            <input type="submit" class="gradient-button" name = "send" value="Upload file" value="Thêm">
						</fieldset>							
					</form>
				</section>
				<section class="three-fourth form-booking">
					<form id="booking" method="post" action="" class="booking " >
						{{csrf_field()}}						
						<!--get inspired list-->
							@foreach ($homestay->image as $imageval)
							<!--column-->
							<article class="one-fourth img_custom">
								<figure>
									<img src="{{asset('public/'.$imageval->url)}}" alt="" width="270" height="152">							
								</figure>
								<div class="details">
									<h5>{{$homestay->name}}</h5>
								</div>
								<div class="details">
									<a href="{{route('delete_image', ['id'=>$imageval->id])}}"  onclick="return confirm ('Bạn có muốn xóa ảnh')"><img style="float: right" src="partner/images/ico/delete1.png" alt="" width="20" height="20" /></a> 
								</div>
							</article>							
							@endforeach							
							@if(empty($homestay->avatar == ""))
							<article class="one-fourth img_custom">
								<figure>
									<img src="{{asset('public/'.$homestay->avatar)}}" alt="" width="270" height="152">							
								</figure>
								<div class="details">
									<h5>Avatar Homestay</h5>
								</div>
								<div class="details">
									<a href="{{route('delete_avatar_homestay', ['id'=>$homestay->id])}}"  onclick="return confirm ('Bạn có muốn xóa ảnh')"><img style="float: right" src="partner/images/ico/delete1.png" alt="" width="20" height="20" /></a> 
								</div>
							</article>
							@endif
							<!--//column-->
						<!--//get inspired list-->
					</form>
				</section>
				<section class="three-fourth">
										
					<!--top destinations-->
					
					<!--//top destinations-->
				</section>
				<!--//three-fourth content-->
				
				<!--right sidebar-->
				<aside class="right-sidebar">
					<!--Booking details-->
					<!-- <article class="booking-details clearfix">
						<h1>Best ipsum hotel 
							<span class="stars">
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
							</span>
						</h1>
						<span class="address">Marylebone, London</span>
						<span class="rating"> 8 /10</span>
						<div class="booking-info">
							<h6>Rooms</h6>
							<p>Standard twin room</p>
							<h6>Room Description</h6>
							<p>Room only</p>
							<h6>Check-in Date</h6>
							<p>14-11-12</p>
							<h6>Check-out Date</h6>
							<p>15-11-12</p>
							<h6>Room(s)</h6>
							<p>1 night, 1 room, max. 2 people. </p>
						</div>
						<div class="price">
							<p class="total">Total Price:  $ 55,00</p>
							<p>VAT (20%) included</p>
						</div>
					</article> -->
					<!--//Booking details-->
					
					<!--Need Help Booking?-->
					<!-- <article class="default clearfix">
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">1- 555 - 555 - 555</p>
					</article> 
					<!--//Need Help Booking?
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>

@endsection