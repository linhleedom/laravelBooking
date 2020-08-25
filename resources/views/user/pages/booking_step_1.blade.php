@extends("user.master")

@section('title')
Booking
@endsection
@section('scriptEnd')
	<script>
		function checked(){
			if($('#check').prop('checked')){
				$('#next-step').prop('disabled', false);
			}else{
				$('#next-step').prop('disabled', true);
			}
		}
		
	</script>
@endsection
@section('content')
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="{{route('userHomePage')}}" title="Home">Home</a></li>
						<li>Check out</li>                                  
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth">
						@if( Auth::check() && Auth::user()->permision == 2 )
							<p> Chào <b>{{Auth::user()->name}}</b> .Chào mừng bạn quay trở lại!</a> </p>
							<form id="booking" method="post" action="{{route('userBookingStep2')}}" class="booking">
								{{ csrf_field() }}
								<input type="hidden" name="datepicker1" value="{{$datepicker1}}">
								<input type="hidden" name="datepicker2" value="{{$datepicker2}}">
								<fieldset>
									<h3><span>01 </span>Thông tin liên hệ</h3>
									<div class="row twins">
										<div class="f-item">
											<label for="name">Tên</label>
											<input type="text" id="name" name="name" value="{{Auth::user()->name}}" required="required"/>
											@if( $errors->logined->has('name') )
												<span class="error_account">{{$errors->logined->first('name')}}</span><br/>
											@endif
										</div>
										<div class="f-item">
											<label for="phone">Số điện thoại</label>
											<input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" required="required"/>
											@if( $errors->logined->has('phone') )
												<span class="error_account">{{$errors->logined->first('phone')}}</span><br/>
											@endif
										</div>
									</div>
									
									<div class="row twins">
										<div class="f-item">
											<label for="email">Địa chỉ email</label>
											<input type="email" id="email" name="email" value="{{Auth::user()->email}}" required="required"/>
											@if( $errors->logined->has('email') )
												<span class="error_account">{{$errors->logined->first('email')}}</span><br/>
											@endif
										</div>
									</div>
									<div class="row">
										<div class="f-item">
											<label>Yêu cầu đặc biệt: <span>(không bắt buộc)</span></label>
											<textarea rows="10" cols="10" name="note" id="note"></textarea>
										</div>
										<!-- <span class="info">Please write your requests in English.</span> -->
									</div>
									<div class="row">
										<div class="f-item checkbox" onclick="checked()">
											<input type="checkbox" name="check" id="check" value="ch1"/>
											<label>Có, tôi đã đọc và chấp nhận các điều khoản trong <a href="user_terms_of_service.html">booking conditions</a>.</label>
										</div>
									</div>
									<input type="submit" class="gradient-button" disabled value="Tiếp theo" id="next-step" />
								</fieldset>
							</form>
						@else
							<p>Nếu bạn đã có tài khoản, hãy đăng nhập để đến bước tiếp theo  <a class="login no-href">đăng nhập</a> </p>
							<form id="booking" method="post" action="{{route('userBookingStep2')}}" class="booking">
								{{ csrf_field() }}
								<input type="hidden" name="datepicker1" value="{{$datepicker1}}">
								<input type="hidden" name="datepicker2" value="{{$datepicker2}}">
								<fieldset>
									<h3><span>01 </span>Thông tin liên hệ</h3>
									<div class="row twins">
										<div class="f-item">
											<label for="name">Tên</label>
											<input type="text" id="name" name="name" required="required" />
											@if( $errors->notLogin->has('name') )
												<span class="error_account">{{$errors->notLogin->first('name')}}</span><br/>
											@endif
										</div>
										<div class="f-item">
											<label for="phone">Số điện thoại</label>
											<input type="text" id="phone" name="phone" required="required"/>
											@if( $errors->notLogin->has('phone') )
												<span class="error_account">{{$errors->notLogin->first('phone')}}</span><br/>
											@endif
										</div>
									</div>
									
									<div class="row twins">
										<div class="f-item">
											<label for="email">Địa chỉ email</label>
											<input type="email" id="email" name="email" required="required"/>
											@if( $errors->notLogin->has('email') )
												<span class="error_account">{{$errors->notLogin->first('email')}}</span><br/>
											@endif
										</div>
										<div class="f-item">
											<label for="confirm_email">Xác thực lại email</label>
											<input type="text" id="confirm_email" name="confirm_email" required="required"/>
											@if( $errors->notLogin->has('confirm_email') )
												<span class="error_account">{{$errors->notLogin->first('confirm_email')}}</span><br/>
											@endif
										</div>
										<span class="info">Bạn sẽ nhận được email xác thực</span>
									</div>
									<div class="row">
										<div class="f-item">
											<label>Yêu cầu đặc biệt: <span>(không bắt buộc)</span></label>
											<textarea rows="10" cols="10" name="note" id="note"></textarea>
										</div>
										<!-- <span class="info">Please write your requests in English.</span> -->
									</div>
									<div class="row">
										<div class="f-item checkbox" onclick="checked()">
											<input type="checkbox" name="check" id="check" value="ch1" />
											<label>Có, tôi đã đọc và chấp nhận các điều khoản trong <a href="user_terms_of_service.html">booking conditions</a>.</label>
										</div>
									</div>
									<input type="submit" class="gradient-button" disabled value="Tiếp theo" id="next-step" />
								</fieldset>
							</form>
						@endif
					</section>
				<!--//three-fourth content-->
				
				<!--right sidebar-->
				<aside class="right-sidebar">
					<!--Booking details-->
					<article class="booking-details clearfix order-booking-step-1">
						@if( Session::has("Cart") != null )
							<h1>{{$homestay->name}}
								<span class="stars">
									<span class="point">{{$homestay->point}}</span>
								</span>
							</h1>
							<span class="address">{{$homestay->province->name}}</span><br/>
							<span class="address">{{$homestay->district->name}}</span>
							@foreach(Session::get("Cart")->product as $item)
								<div class="booking-info">
									<h6>Tên phòng</h6>
									<p>{{ucfirst($item['productInfo']->name)}}</p>
									<h6>Loại phòng</h6>
									<p>{{$item['productInfo']->roomType->name}}</p>
									<h6>Phù hợp với: <span>{{$item['productInfo']->roomType->capacity}} người</span></h6>
									
									
									<h6 class="price-text">Giá: <span class="price">{{ number_format( $item['productInfo']->prices*(100-$item['productInfo']->discount)/100,0,',','.' ) }}đ</span></h6>
									
								</div>
							@endforeach
							<div class="price">
								<p class="total">Tổng tiền: <span class="payment">{{ number_format( Session::get("Cart")->totalPrice,0,',','.' ) }}đ</span></p>
								<p class="total">Tổng số phòng: <span class="payment">{{Session::get("Cart")->totalQuanty}}</span></p>
								<p class="total">Ngày nhận phòng: <span class="payment"><i>{{$datepicker1}}</i> </span></p>
								<p class="total">Ngày trả phòng: <span class="payment"> <i>{{$datepicker2}}</i> </span></p>
								<p>Đã bao gồm VAT(10%)</p>
							</div>
						@endif	
					</article>
					<!--//Booking details-->
					
					<!--Need Help Booking?-->
					<article class="default clearfix">	
						<h2>Hỗ trợ đặt phòng?</h2>
						<p>Gọi cho nhóm dịch vụ khách hàng của chúng tôi theo số dưới đây để nói chuyện với một trong những cố vấn của chúng tôi, những người sẽ giúp bạn với tất cả các nhu cầu kỳ nghỉ của bạn.</p>
						<p class="number">1800 1989</p>
					</article>
					<!--//Need Help Booking?-->
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection