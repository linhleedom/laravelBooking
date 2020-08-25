@extends('partner.master')
@section('script')
function convert_name($str) {
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
	$str = preg_replace("/(Đ)/", 'D', $str);
	$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
	$str = preg_replace("/( )/", '-', $str);
	return $str;
}
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
					<li><a href="{{url('trangchu')}}" title="Home">Home</a></li>  
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
					<h1 style="text-align: center;text-transform: uppercase;">Thông tin phòng của bạn</h1>
					<form id="booking" method="post" action="" class="booking " enctype="multipart/form-data" >
						@csrf
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<fieldset>

							<h3><span>01 </span> Hạng mục homestay</h3>
							<div class="row twins">
								<div class="f-item custom-item">
									<label>Tên homestay</label>
									<select name="homestay_id" id="">
										<option selected="selected" >Chọn</option>
										@foreach ($homestay as $homestayVal)											
											<option value="{{$product->homestay_id}}" @if($homestayVal->id == $product->homestay_id) selected @endif >{{$homestayVal->name}}</option>
										@endforeach										
									</select>
								</div>
								<div class="f-item custom-item">
									<label for="">Trạng thái của phòng</label>
									<label for="status1">Ẩn  &nbsp 
										<input required type="radio" id="status1" name="status"  value="0" checked/></label>
									<label for="status2">Hiện  &nbsp 
										<input required type="radio" id="status2" name="status"  value="1"/>
									</label>
								</div>
							</div>
							<h3 style="margin-top: 20px;"><span>02</span> Chi tiết chỗ nghỉ</h3>
							<div class="row twins">
								<div class="f-item custom-item">
									<label for="">Tên phòng :
										<input type="text" name="name" value="{{$product->name}}" >
									</label>									
								</div>								
								<div class="f-item custom-item">
									<label for="">Kiểu phòng :</label>
									<select name="room_type_id" id="">										
										<option selected="selected" >Chọn</option>
											@foreach($room_type as $room_typeval)
												<option value="{{$product->room_type_id}}" @if($room_typeval->id == $product->room_type_id) selected @endif >{{$room_typeval->name}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<h3 style="margin-top: 20px;"><span>02</span> Giá phòng & ưu đãi </h3>

							<div class="row twins">
								<div class="f-item custom-item">
									<label>Nhập giá phòng (VNĐ) :</label>
									<form action="/action_page.php">
									<input type="text" id="prices" name="prices" value="{{$product->prices}}" ><br><br>
									</form>
								</div>
								<div class="f-item custom-item">
									<label>Giảm giá :</label>
									<input type="text" id="discount" name="discount" value="{{$product->discount}}" placeholder="... %">
								</div>																
							</div>

							<div class="row twins">
							<h3 style="margin-top: 20px;"><span>03</span> Mô tả </h3>
								<div class="f-item custom-item">
									<label>Mô tả khác: </label>
								<textarea rows="10" cols="10" id="description" name="description" >{{$product->description}}</textarea>
								</div>
							</div>
							
							<h3 style="margin-top: 20px;"><span>04</span> Tiện ích có tại chỗ nghỉ</h3>
							<div class="row twins">
								<div class="f-item custom-item checkbox">
										@foreach ( $Utilities as $Utilitiesval)		
											<input type="checkbox" name="tienich[]" id="check" value="{{$Utilitiesval->product_id}}" 
												
											@foreach ( $product->utilities as $productval)
												@if($productval->utilities_id == $Utilitiesval->product_id ) checked = "checked" @endif
											
											@endforeach
											/>
												<label for="" >{{$Utilitiesval->name }}</label> <br> <br>
										@endforeach
									{{-- @endforeach --}}
								</div>
							</div>	

							<h3 style="margin-top: 20px;"><span>05</span> Ảnh </h3>

							<div class="row twins">
								<div class="f-item custom-item">
									<label for="avatar">Thay ảnh phòng :</label>
										<input  required="required" type="file" name="avatar" multiple id="avatar" value="{{$product->avatar}}">
										<br><br>
										<img src="{{asset('public/'.$product->avatar)}}" alt="Image" width="300px" height="150px" >
								</div>
							</div>
							<br>
							<input type="submit" class="gradient-button" value="Cập nhật" id="update" >	
							</div>
						
						</fieldset>							
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