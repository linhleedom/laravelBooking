@extends('partner.master')
@section('script')
	$(document).ready(function(){
		$('#provinces').change(function(){
		var cid = $(this).val();
		if(cid){
		$.ajax({
		type:"get",
		url: '../partner/getdistricts/'+cid,//Please see the note at the end of the post**
		success:function(res)
		{       
				if(res.length !== 0)
				{
					$("#districts").empty();
					$("#wards").empty();
					$("#districts").append('<option>Chon</option>');
					$.each(res,function(key,value){
						$("#districts").append('<option value="'+key+'">'+value+'</option>');
					});
				}else{
					$("#districts").empty();
					$("#wards").empty();
					$("#districts").append('<option>Chọn</option>');
					$("#wards").append('<option>Chọn</option>');
				}
		}

		});
		}
	});

	$('#districts').change(function(){
		var cid = $(this).val();
		if(cid){
		$.ajax({
		type:"get",
		url: '../partner/getwards/'+cid,//Please see the note at the end of the post**
		success:function(res)
		{       
				if(res)
				{
					$("#wards").empty();
					$("#wards").append('<option>Chon</option>');
					$.each(res,function(key,value){
						$("#wards").append('<option value="'+key+'">'+value+'</option>');
					});
				}
		}

		});
		}
	});

	});
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
						<li><a href="#" title="Home">Home</a></li>  
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
						<h1 style="text-align: center;text-transform: uppercase;">Thông tin homestay của bạn</h1>
						<form id="booking" method="post" action="booking-step2.html" class="booking ">
							<fieldset>
								<h3 style="margin-top: 20px;"><span>01</span> Địa chỉ Homestay của bạn </h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label for="text">Tên chỗ nghỉ </label>
										<input type="text" id="name" name="name" />
									</div>
									<div class="f-item custom-item">
										<label>Tỉnh (Thành Phố)</label>
										<select name="provinces" id="provinces">
											<option selected="selected">Chọn</option>
											@if($provinces)
												@foreach($provinces as $province)
													<option value="{{$province->matp}}">{{$province->name}}</option>
												@endforeach
											@endif
										</select>
                                    </div>
                                    <div class="f-item custom-item">
										<label>Quận (HUyện)</label>
										<select name="districts" id="districts">
											<option selected="selected">Chọn</option>
										</select>
                                    </div>
                                    <div class="f-item custom-item">
										<label>Phường Xã</label>
										<select name="wards" id="wards">
											<option selected="selected">Chọn</option>
										</select>
									</div>
									<!-- <span class="info">You’ll receive a confirmation email</span> -->
                                </div>

                                <h3 style="margin-top: 20px;"><span>02</span> Loại Homestay</h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label>Loại căn hộ </label>
										<input type="text" id="brand_name" name="brand_name" />
									</div>
									
									<div class="f-item custom-item">
										<label for="">Trạng thái của Homestay</label>
										<input type="checkbox" id="status" name="status"  value=""/> &nbsp <b>Ẩn/Hiện</b>
									</div>
                                </div>
							</fieldset>							
							<input type="submit" class="gradient-button" value="Thêm mới" id="add" >
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
					</article> -->
					<!--//Need Help Booking?-->
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection
