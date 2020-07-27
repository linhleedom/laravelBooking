@extends("user.master")

@section('title')
Booking
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
						<li><a href="#" title="Home">Home</a></li>
						<li><a href="#" title="Hotels">Check out</a></li>                                  
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth">
						<p>Nếu bạn đã có tài khoản, hãy đăng nhập để đến bước tiếp theo  <a class="login no-href">đăng nhập</a> </p>
						<form id="booking" method="post" action="user_booking_step_2.html" class="booking">
							<fieldset>
								<h3><span>01 </span>Thông tin liên hệ</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="name">Tên</label>
										<input type="text" id="name" name="name" />
									</div>
									<div class="f-item">
										<label for="phone">Số điện thoại</label>
										<input type="text" id="phone" name="phone" />
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="email">Địa chỉ email</label>
										<input type="email" id="email" name="email" />
									</div>
									<div class="f-item">
										<label for="confirm_email">Xác thực lại email</label>
										<input type="text" id="confirm_email" name="confirm_email" />
									</div>
									<span class="info">Bạn sẽ nhận được email xác thực</span>
								</div>
								<div class="row">
									<div class="f-item">
										<label>Yêu cầu đặc biệt: <span>(không bắt buộc)</span></label>
										<textarea rows="10" cols="10"></textarea>
									</div>
									<!-- <span class="info">Please write your requests in English.</span> -->
								</div>
								<div class="row">
									<div class="f-item checkbox">
										<input type="checkbox" name="check" id="check" value="ch1" />
										<label>Có, tôi đã đọc và chấp nhận các điều khoản trong <a href="user_terms_of_service.html">booking conditions</a>.</label>
									</div>
								</div>
								<input type="submit" class="gradient-button" value="Tiếp theo" id="next-step" />
							</fieldset>
						</form>
					</section>
				<!--//three-fourth content-->
				
				<!--right sidebar-->
				<aside class="right-sidebar">
					<!--Booking details-->
					<article class="booking-details clearfix">
						<h1>Tên homestay
							<span class="stars">
								<img src="user/images/ico/star.png" alt="" />
								<img src="user/images/ico/star.png" alt="" />
								<img src="user/images/ico/star.png" alt="" />
								<img src="user/images/ico/star.png" alt="" />
							</span>
						</h1>
						<span class="address">Hà Nội</span>
						<div class="booking-info">
							<h6>Loại phòng</h6>
							<p>Phòng 1 giường đơn</p>
							<h6>Số lượng</h6>
							<p>1</p>
							<h6>Ngày nhận phòng</h6>
							<p>22/03/2020</p>
							<h6>Ngày trả phòng</h6>
							<p>23/03/2020</p>
							<h6>Giá</h6>
							<p>200.000đ</p>
						</div>
						<div class="booking-info">
							<h6>Loại phòng</h6>
							<p>Phòng 1 giường đơn</p>
							<h6>Số lượng</h6>
							<p>1</p>
							<h6>Ngày nhận phòng</h6>
							<p>22/03/2020</p>
							<h6>Ngày trả phòng</h6>
							<p>23/03/2020</p>
							<h6>Giá</h6>
							<p>200.000đ</p>
						</div>
						<div class="price">
							<p class="total">Tổng tiền: 400.000đ</p>
							<p>Đã bao gồm VAT(10%)</p>
						</div>
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