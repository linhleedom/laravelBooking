@extends('partner.master')
@section('title')
Add Homestay
@endsection
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
				$("#districts").append('<option></option>');
				$.each(res,function(key,value){
					$("#districts").append('<option value="'+key+'">'+value+'</option>');
				});
			}else{
				$("#districts").empty();
				$("#wards").empty();
				$("#districts").append('<option></option>');
				$("#wards").append('<option></option>');
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
				$("#wards").append('<option></option>');
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
			<div class="content clearfix">
				<nav role="navigation" class="breadcrumbs clearfix">
					<ul class="crumbs">
						<li><a href="{{url('partner/trangchu')}}" title="Home">Home</a></li>  
						<li><a href="{{url('partner/list-homestay')}}" title="ListHomestay">Danh sách Homestay</a></li>  
						<li>Thêm Homestay</li>                               
					</ul> 
				</nav>

				<!--three-fourth content-->
				<section class="three-fourth form-booking">
					<h1 style="text-align: center;text-transform: uppercase;">Thêm thông tin homestay của bạn</h1>
					<form id="booking" method="post" action="" class="booking " enctype="multipart/form-data">
						@if(Session::get('thongbao') == 'success')
							<i class="notify-success">{{Session::get('massage')}}</i>
						@endif
						<fieldset>
								<div colspan="2" 
								style="
									color: #32df5d;
									border-color: #ebccd1;
									width: 500px;
									height: 20px;
									font-size: 1.5em;
								">
							</div>
							<h3 style="margin-top: 20px;"><span>01</span> Địa chỉ Homestay của bạn </h3>
							@csrf
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							
							<div class="row twins">
								<div class="f-item custom-item">
									<label for="text">Tên chỗ nghỉ </label>
									<input  type="text" id="name" name="name" />
									@if( $errors->addHomestay->has('name') )
										<span class="notify"><i>{{$errors->addHomestay->first('name')}}</i></span><br/>
									@endif
									
								</div>
								<div class="f-item custom-item">
									<label>Tỉnh (Thành Phố)</label>
									<select name="matp" id="provinces">
										<option disabled selected value >Chọn</option>
										@if($provinces)
											@foreach($provinces as $province)
												<option value="{{$province->matp}}" >{{$province->name}}</option>
											@endforeach
										@endif
									</select>
									@if( $errors->addHomestay->has('matp') )
										<span class="notify"><i>{{$errors->addHomestay->first('matp')}}</i></span><br/>
									@endif
								</div>
								<div class="f-item custom-item">
									<label>Quận (Huyện)</label>
									<select name="maqh" id="districts">
										<option disabled selected value>Chọn</option>
									</select>
									@if( $errors->addHomestay->has('maqh') )
										<span class="notify"><i>{{$errors->addHomestay->first('maqh')}}</i></span><br/>
									@endif
								</div>
								<div class="f-item custom-item">
									<label>Phường Xã</label>
									<select name="xaid" id="wards">
										<option disabled selected value>Chọn</option>
									</select>
									@if( $errors->addHomestay->has('xaid') )
										<span class="notify"><i>{{$errors->addHomestay->first('xaid')}}</i></span><br/>
									@endif
								</div>
							</div>	

							<h3 style="margin-top: 20px;"><span>02</span> Loại Homestay</h3>
							<div class="row twins">
								<div class="f-item custom-item">
									<label>Mô tả Homestay :</label>
									<textarea rows="10" cols="10" name="description" placeholder="Thông tin mô tả"></textarea>
									@if( $errors->addHomestay->has('description') )
										<span class="notify"><i>{{$errors->addHomestay->first('description')}}</i></span><br/>
									@endif
								</div>
								
								<div class="f-item custom-item">
									<label>Title: </label>
									<input type="text" name = "title">
									@if( $errors->addHomestay->has('title') )
										<span class="notify"><i>{{$errors->addHomestay->first('title')}}</i></span><br/>
									@endif									
								</div>
								
								<div class="f-item custom-item">
									<label for="">Trạng thái của Homestay</label>
									<label for="status1">Ẩn  &nbsp 
										<input required type="radio" id="status1" name="status"  value="0" checked/></label>
									<label for="status2">Hiện  &nbsp 
										<input required type="radio" id="status2" name="status"  value="1"/>
									</label>										
								</div>
							</div>
							<div class="row twins">								
								<div class="f-item custom-item">
									<h3 style="margin-top: 20px;"><span>03</span> Ảnh đại diện Homestay </h3>
										<input  type="file" name="avatar" multiple>
									@if( $errors->addHomestay->has('avatar') )
										<span class="notify"><i>{{$errors->addHomestay->first('avatar')}}</i></span><br/>
									@endif	
								</div>
										<br><br>
										{{-- <input type="submit" class="gradient-button" name = "send" value="Upload file"> --}}
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

@endsection