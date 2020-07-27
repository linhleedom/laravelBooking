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
						<form id="booking" method="post" action="booking" class="booking">
							<fieldset>
								<h3><span>03 </span>Đặt phòng thành công</h3>
								<div class="text-wrap">
									<p>Cảm ơn bạn. Đặt phòng của bạn bây giờ đã được xác nhận.</p>
								</div>
								
								<h3>Thông tin khách hàng</h3>
								<div class="text-wrap">
									<div class="output">
										<p>Họ tên khách hàng:</p>
										<p>Lê Duy Linh</p>
										<p>Địa chỉ email: </p>
										<p>mail@google.com</p>
										<p>Số điện thoại:</p>
										<p>0388 424 474</p>
									</div>
								</div>
							
								<h3>Yêu cầu đặc biệt</h3>
								<div class="text-wrap">
									<p>Tôi muốn đặt một phòng đôi với tầm nhìn ra biển rõ ràng. Cảm ơn và trân trọng</p>
								</div>
								
								<h3>Thanh toán</h3>
								<div class="text-wrap">
									<h5>Khách hàng sẽ <strong class="dark">thanh toán trực tiếp</strong> tại Homestay<br /><br /></h5>
									<p><strong class="dark">Mọi thông tin chi tiết đã được chúng tôi gửi đến hòm thư email của bạn</strong></p>
								</div>
								<br /><br />
								<h3>Đăng kí để nhận những ưu đãi hấp dẫn</h3>
								<div class="row twins">
									<div class="f-item">
										<form id="newsletter" action="newsletter.php" method="post">
											<fieldset>
												<input type="email" id="newsletter_signup" name="newsletter_signup" placeholder="Enter your email here" />
												<input type="submit" id="newsletter_submit" name="newsletter_submit" value="Signup" class="gradient-button register" />
											</fieldset>
										</form>
									</div>
								</div>
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