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
						<li><a href="{{url('partner/trangchu')}}" title="Home">Home</a></li> 
						<li>Thêm Homestay</li>                               
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
                    {{-- {{Route('upload_images')}} --}}
                <form id="booking" method="post" action="" class="booking " enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div colspan="2" 
									style="color: #32df5d;
										/* background-color: #f2dede; */
										border-color: #ebccd1;
										width: 500px;
										height: 50px;
										font-size: 1.5em;
								">
										{{Session::get('thongbao')}}
								</div>
						<fieldset>
                            <h3 style="margin-top: 20px;"><span>01</span> Upload Ảnh </h3>
                            <input type="file" name="url[]" multiple>
                            <br><br>
                            <input type="submit" class="gradient-button" name = "send" value="Upload file">
						</fieldset>							
					</form>
				</section>
				<section class="three-fourth form-booking">
						{{-- {{Route('upload_images')}} --}}
					<form id="booking" method="post" action="" class="booking " >
							{{csrf_field()}}
							<div colspan="2" 
										style="color: #32df5d;
											/* background-color: #f2dede; */
											border-color: #ebccd1;
											width: 500px;
											height: 50px;
											font-size: 1.5em;
									">
											{{Session::get('thongbao')}}
									</div>
							<table style="width : 100%">
								<tr>
									<th>STT</th>
									<th>Homestay</th>
									<th>Ảnh</th>
									<th>Tên ảnh</th>
									<th colspan="2">Chức năng</th>
								</tr>
								<?php $i = 0 ;?>								
								@foreach ($homestay->image as $imageval)
								<?php $i++;  ?> 
									<tr>										
										<td>
											{{$i}}
										</td>
										<td>{{$homestay->name}}</td>
											
										<td >
											<img src="{{asset('public/'.$imageval->url)}}" alt="Image" width="300px" height="150px" > <br>
										</td>
										<td> <?php echo substr("{$imageval->url}",17) ?></td>
												
											
										<td colspan="2">											
											<a href="{{url('partner/delete_image', ['id'=>$imageval->id])}}" title="Sửa" class="gradient-button delete" onclick="return confirm ('Bạn có muốn xóa ảnh')">Xóa </a>
										</td>	
									</tr>	
								@endforeach
							</table>	
							<div class="bottom-nav">
								<!--back up button-->
								<a href="#" class="scroll-to-top" title="Back up">Top</a> 
								<!--//back up button-->
							</div>					
						</form>
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