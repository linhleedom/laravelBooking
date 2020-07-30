@extends('partner/master')
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
						<li><a href="#" title="Hotels">Reset Password</a></li>                                  
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<!-- <ul class="top-right-nav">
						<li><a href="#" title="Back to results">Quay lại</a></li>
					</ul> -->
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth">
						<form id="booking" method="post" action="reset-password-partner-step2.html" class="booking">
							<fieldset>
								<h3><span>01 </span>Nhập tài khoản gmail</h3>								
								<div class="row twins">
									<div class="f-item">
										<label for="email">Địa chỉ email</label>
										<input type="email" id="email" name="email" />
									</div>
								</div>
								<input type="submit" class="gradient-button" value="Tiếp tục " id="next-step" />
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
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
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
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">1- 555 - 555 - 555</p>
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