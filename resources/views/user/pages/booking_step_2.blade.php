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
					
					<!--top right navigation-->
					<ul class="top-right-nav">
						<li><a href="#" title="Back to results">Quay lại</a></li>
					</ul>
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth">
						<form id="booking" method="post" action="user_booking_step_3.html" class="booking">
							<fieldset>
								<h3><span>02 </span>Xác minh email</h3>
								<div class="row">
									<div class="f-item">
										<h5>Chúng tôi đã gửi mã xác nhận đến email của bạn( Nếu không phát hiện email, hãy kiểm tra trong hộp thư <strong>spam</strong>)</h5><br/>
									</div>
								</div>
								<div class="row">
									<div class="f-item">
										<p>Nếu vẫn không nhận được email xác thực, hãy nhấp vào <strong>Gửi lại</strong> bên dưới </p>
									</div>
								</div>
								<input type="submit" class="gradient-button" value="Gửi lại email xác minh" id="next-step" />
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