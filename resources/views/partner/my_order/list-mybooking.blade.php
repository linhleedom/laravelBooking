@extends('partner.master')
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
                        <li>My booking</li>                                
					</ul>
					<!--//crumbs-->
				
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth" style="width: 100%">
				
					<h1 style="text-align: center;font-size: 40px;">My booking</h1>
					
					<!--inner navigation-->
					<!-- <nav class="inner-nav">
						<ul>
                            <li><a href="#MyReviews" title="My Reviews">My Reviews</a></li>
						</ul>
					</nav> -->
					<!--//inner navigation-->			
					
					<!--My Bookings-->
					<section id="MyBookings" class="tab-content tab-booking">
						<!--booking-->
						<article class="bookings">
							<h1><a href="#">Hóa đơn số 01</a></h1>
							<div class="b-info">
								<table>
									<tr>
										<th>Tên Khách Hàng</th>
										<td>Nguyễn Văn A</td>
									</tr>
									<tr>
										<th>Email</th>
										<td>vtlong2210@gmail.com</td>
                                    </tr>
                                    <tr>
										<th>Số điện thoại</th>
										<td>0359989090</td>
									</tr>
									<tr>
										<th>Check-in Date</th>
										<td>23-05-14</td>
									</tr>
									<tr>
										<th>Check-out Date</th>
										<td>30-05-14</td>
									</tr>
									<tr>
										<th>Tổng tiền:</th>
										<td><strong> 500,000 VNĐ</strong></td>
                                    </tr>
                                    <tr>
										<th>Trạng thái thanh toán:</th>
										<td><strong>Đã thanh toán / Chưa thanh toán</strong></td>
                                    </tr>
								</table>
							</div>
							
							<div class="actions">
								<a href="my-detail-booking.html" class="gradient-button see">Xem chi tiêt</a>
								<a href="edit-detail-booking.html" class="gradient-button edit1">Sửa hóa đơn</a>
								<a href="" class="gradient-button delete">Xóa hóa đơn</a>
							</div>
						</article>
						<!--//booking-->
					</section>
					<!--//My Bookings-->
					
				</section>
				<!--//three-fourth content-->
				
				<!--sidebar-->
				<aside class="right-sidebar">

					<!--Need Help Booking?-->
					<!-- <article class="default clearfix">
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">1- 555 - 555 - 555</p>
					</article> -->
					<!--//Need Help Booking?-->
					
					<!--Why Book with us?-->
					<!-- <article class="default clearfix">
						<h2>Why Book with us?</h2>
						<h3>Low rates</h3>
						<p>Get the best rates, or get a refund.<br />No booking fees. Save money!</p>
						<h3>Largest Selection</h3>
						<p>140,000+ hotels worldwide<br />130+ airlines<br />Over 3 million guest reviews</p>
						<h3>We’re Always Here</h3>
						<p>Call or email us, anytime<br />Get 24-hour support before, during, and after your trip</p>
					</article> -->
					<!--//Why Book with us?-->
					
				</aside>
				<!--//sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection