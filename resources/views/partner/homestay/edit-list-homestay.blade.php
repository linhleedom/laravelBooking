@extends('partner.master')
@section('title')
Edit list homestay
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
{{-- function convert_name($str) {
	if(!$str){
		return "";
	};
	$unicode = array(
		'a' => 'à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ',
		'e' => 'è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ',
		'i' => 'ì|í|ị|ỉ|ĩ',
		'o' => 'ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ',
		'u' => 'ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ',
		'y' => 'ỳ|ý|ỵ|ỷ|ỹ',
		'd' => 'đ',
		'A' => 'À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ',
		'E' => 'È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ',
		'I' => 'Ì|Í|Ị|Ỉ|Ĩ',
		'O' => 'Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ',
		'U' => 'Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ',
		'Y' => 'Ỳ|Ý|Ỵ|Ỷ|Ỹ',
		'D' => 'Đ',
		'-' => '\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/',
		'-' => '/( )/',
	);

	foreach ($unicode as $khongdau=> $codau){
		$uni_co_dau = explode("|",$codau);

		$str = str_replace($uni_co_dau,$khongdau,$str);
	};
	return $str;
	
} --}}
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
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth form-booking">
						<h1 style="text-align: center;text-transform: uppercase;">Sửa thông tin homestay <br><br><b style="color: lightcoral"><u>{{$homestay->name}}</u></b> </h1>
					<form id="booking" method="post" action="" class="booking ">
							{{csrf_field()}}
							<fieldset>
								
								<tr>
									<td colspan="2" class="alert-danger">
										{{Session::get('Thongbao')}}
									</td>
								</tr>
								<h3 style="margin-top: 20px;"><span>01</span> Địa chỉ Homestay của bạn </h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label for="name">Tên chỗ nghỉ </label>
									<input type="text" id="name"  name="name"  value="{{$homestay->name}}" />
									</div>
									<div class="f-item custom-item">
										<label>Tỉnh (Thành Phố)</label>
										<select name="provinces" id="provinces">
											@foreach($provinces as $province)
												<option  value="{{$province->matp}}" @if($homestay->matp == $province->matp) selected @endif >{{$province->name}}</option>
											@endforeach
										</select>
                                    </div>
                                    <div class="f-item custom-item">
										<label>Quận (HUyện)</label>
										<select name="district" id="districts">
											@foreach($district as $districtVal)
											<option  value="{{$districtVal->maqh}}" @if($homestay->maqh == $districtVal->maqh) selected @endif >{{$districtVal->name}}</option>
											@endforeach
										</select>
                                    </div>
                                    <div class="f-item custom-item">
										<label>Phường Xã</label>
										<select name="ward" id="wards">
											@foreach($ward as $WardVal)
												<option  value="{{$WardVal->xaid}}" @if($homestay->xaid == $WardVal->xaid) selected @endif >{{$WardVal->name}}</option>
											@endforeach
										</select>
									</div>
									<!-- <span class="info">You’ll receive a confirmation email</span> -->
                                </div>

                                <h3 style="margin-top: 20px;"><span>02</span> Loại Homestay</h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label>Mô tả Homestay :
											<textarea rows="10" cols="10" name="description" placeholder="Thông tin mô tả" >{{$homestay->description}}</textarea>
										</label>
									</div>
									<div class="f-item custom-item">
										<label>Title: </label>
									<input  required= "required" type="text" name = "title" value="{{$homestay->title}}">
									</div>
									
									<div class="f-item custom-item">
										<label for="status">Trạng thái của Homestay</label>
										<label for="status1">Ẩn  &nbsp 
											<input required type="radio" id="status1" name="status"  value="0" @if($homestay->status ==0) checked  @endif/></label>
										<label for="status2">Hiện  &nbsp 
											<input required type="radio" id="status2" name="status"  value="1" @if($homestay->status == 1) checked  @endif/>
										</label>
									</div>									
								</div>
								
							<input type="submit" class="gradient-button" value="Update" id="Edit" >
							</fieldset>							
						{{-- <input href = "{{asset('partner/list-homestay')}}" type="submit" class="gradient-button" value="Cancel" id="Cancel" > --}}
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

