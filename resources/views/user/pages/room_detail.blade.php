@extends("user.master")

@section('title')
Room Detail
@endsection

@section('script')
@endsection

@section('home')
class="active"
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
						<li><a href="#" title="Hotels">Homestay</a></li>
						<li><a href="#" title="United Kingdom">Tên Homestay</a></li>
						<li><a href="#" title="London">All</a></li>                                     
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<ul class="top-right-nav">
						<li><a href="user_search_results.html" title="Back to results">Back to results</a></li>
					</ul>
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<img src="uploads/homestay/img1.jpg" alt="" width="850" height="531" />
						<img src="uploads/homestay/img2.jpg" alt="" width="850" height="531" />
						<img src="uploads/homestay/img3.jpg" alt="" width="850" height="531" />
						<img src="uploads/homestay/img4.jpg" alt="" width="850" height="531" />
						<img src="uploads/homestay/img5.jpg" alt="" width="850" height="531" />
					</section>
					<!--//gallery-->
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li class="availability"><a href="#availability" title="Availability">Phòng có sẵn</a></li>
							<li class="description"><a href="#description" title="Description">Mô tả</a></li>
							<li class="facilities"><a href="#facilities" title="Facilities">Cơ sỏ vật chất</a></li>
							<!-- <li class="location"><a href="#location" title="Location">Vị trí</a></li> -->
							<li class="reviews"><a href="#reviews" title="Reviews">Đánh giá</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					
					<!--availability-->
					<section id="availability" class="tab-content">
						<article>
							<h1>Phòng có sẵn</h1>
							<div class="text-wrap">
								<a href="user_search_results.html" class="gradient-button right" title="Change dates">Đổi ngày</a>
								<p>Phòng có sẵn từ <span class="date">23/06/2020</span> đến <span class="date">24/06/2020</span>.</p>
							</div>
							
							<!-- <h1>Room types</h1> -->
							<ul class="room-types">
								<!--room-->
								<li>
                                    <figure class="left"><img src="uploads/room/img3.jpg" alt="" width="270" height="152" />
									<a href="uploads/room/img3.jpg" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>
                                    <div class="meta">
                                        <h2>Phòng 2 giường đơn</h2>
                                        <p>Wifi miễn phí<br />Chỗ đỗ xe miễn phí </p>
                                        <p>Còn 3 phòng<br />Đã bao gồm 10% VAT </p>
                                        <a href="javascript:void(0)" title="more info" class="more-info">+ Thêm</a>
                                    </div>
                                    <div class="room-information">
                                        <div class="row">
                                            <span class="first">Phù hợp:</span>
                                            <span class="second"><img src="user/images/ico/person.png" alt="" /><img src="user/images/ico/person.png" alt="" /></span>
                                        </div>
                                        <div class="row price">
                                            <span class="first">Giá: </span>
                                            <span class="second">200.000đ</span>
                                        </div>
                                        <form action="" method="get">
                                            <div class="row">
                                                <label for="number-room" id="choice-number" class="first">Số lượng:</label>
                                                <input type="number" id="number-room" class="second" name="number-room" min="0" max="3"></input>

                                            </div>
                                            <input type="submit" class="gradient-button" value="Chọn" id="book" name="book">
                                        </form>
                                    </div>
                                    <div class="more-information">
                                        <p>Stylish and individually designed room featuring a satellite TV, mini bar and a 24-hour room service menu.</p>
                                        <p><strong>Đồ dùng trong phòng:</strong> Safety Deposit Box, Air Conditioning, Desk, Ironing Facilities, Seating Area, Heating, Shower, Bath, Hairdryer, Toilet, Bathroom, Pay-per-view Channels, TV, Telephone</p>
                                        <!-- <p><strong>Bed Size(s):</strong> 1 Double </p> -->
                                        <p><strong>Kích thước phòng:</strong>  16 m<sup>2</sup></p>
                                    </div>
								</li>
								<!--//room-->
								
								<!--room-->
								<li>
									<figure class="left"><img src="uploads/room/img.jpg" alt="" width="270" height="152" />
									<a href="uploads/room/img.jpg" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>
									<div class="meta">
										<h2>Phòng 1 giường đơn</h2>
										<p>Wifi miễn phí<br />Chỗ đỗ xe miễn phí </p>
										<p>Có điều hòa<br />Đã bao gồm 10% VAT </p>
										<a href="javascript:void(0)" title="more info" class="more-info">+ Thêm</a>
									</div>
									<div class="room-information">
										<div class="row">
											<span class="first">Phù hợp:</span>
											<span class="second">
												<img src="user/images/ico/person.png" alt="" />
											</span>
										</div>
										<div class="row price">
											<span class="first">Giá:</span>
											<span class="second">100.000đ</span>
										</div>
										<form action="" method="get">
											<div class="row">
												<label for="number-room" id="choice-number" class="first">Số lượng:</label>
												<input type="number" id="number-room" class="second" name="number-room" min="0" max="3"></input>

											</div>
											<input type="submit" class="gradient-button" value="Chọn" id="book" name="book">
										</form>
									</div>
									<div class="more-information">
										<p>Stylish and individually designed room featuring a satellite TV, mini bar and a 24-hour room service menu.</p>
										<p><strong>Đồ dùng trong phòng:</strong> Safety Deposit Box, Air Conditioning, Desk, Ironing Facilities, Seating Area, Heating, Shower, Bath, Hairdryer, Toilet, Bathroom, Pay-per-view Channels, TV, Telephone</p>
										<!-- <p><strong>Bed Size(s):</strong> 1 Double </p> -->
										<p><strong>Kích thước phòng:</strong>  16 m<sup>2</sup></p>
									</div>
								</li>
								<!--//room-->
								
								<!--room-->
								<li>
									<figure class="left">
										<img src="uploads/room/img3.jpg" alt="" width="270" height="152" /> 
										<a href="uploads/room/img3.jpg" class="image-overlay" rel="prettyPhoto[gallery1]"></a>
									</figure>
									<div class="meta">
										<h2>Phòng 2 giường đôi</h2>
										<p>Wifi miễn phí<br />Chỗ đỗ xe miễn phí </p>
										<p>Có điều hòa<br />Đã bao gồm 10% VAT </p>
										<a href="javascript:void(0)" title="more info" class="more-info">+ Thêm</a>
									</div>
									<div class="room-information">
										<div class="row">
											<span class="first">Phù hợp:</span>
											<span class="second">
												<img src="user/images/ico/person.png" alt="" />
												<img src="user/images/ico/person.png" alt="" />
												<img src="user/images/ico/person.png" alt="" />
												<img src="user/images/ico/person.png" alt="" />
											</span>
										</div>
										<div class="row price">
											<span class="first">Giá:</span>
											<span class="second">440.000đ</span>
										</div>
										<form action="" method="get">
											<div class="row">
												<label for="number-room" id="choice-number" class="first">Số lượng:</label>
												<input type="number" id="number-room" class="second" name="number-room" min="0" max="3"></input>

											</div>
											<input type="submit" class="gradient-button" value="Chọn" id="book" name="book">
										</form>
									</div>
									<div class="more-information">
										<p>Stylish and individually designed room featuring a satellite TV, mini bar and a 24-hour room service menu.</p>
										<p><strong>Đồ dùng trong phòng:</strong> Safety Deposit Box, Air Conditioning, Desk, Ironing Facilities, Seating Area, Heating, Shower, Bath, Hairdryer, Toilet, Bathroom, Pay-per-view Channels, TV, Telephone</p>
										<!-- <p><strong>Bed Size(s):</strong> 1 Double </p> -->
										<p><strong>Kích thước phòng:</strong>  16 m<sup>2</sup></p>
									</div>
								</li>
								<!--//room-->
								
								<!--room-->
								<li>
									<figure class="left"><img src="uploads/room/img4.jpg" alt="" width="270" height="152" />
									<a href="uploads/room/img4.jpg" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>
									<div class="meta">
										<h2>Phòng 2 giường đôi</h2>
										<p>Wifi miễn phí<br />Chỗ đỗ xe miễn phí </p>
										<p>Có điều hòa<br />Đã bao gồm 10% VAT </p>
										<a href="javascript:void(0)" title="more info" class="more-info">+ Thêm</a>
									</div>
									<div class="room-information">
										<div class="row">
											<span class="first">Phù hợp:</span>
											<span class="second">
												<img src="user/images/ico/person.png" alt="" />
												<img src="user/images/ico/person.png" alt="" />
												<img src="user/images/ico/person.png" alt="" />
												<img src="user/images/ico/person.png" alt="" />
											</span>
										</div>
										<div class="row price">
											<span class="first">Giá:</span>
											<span class="second">300.000đ</span>
										</div>
										<form action="" method="get">
											<div class="row">
												<label for="number-room" id="choice-number" class="first">Số lượng:</label>
												<input type="number" id="number-room" class="second" name="number-room" min="0" max="3"></input>

											</div>
											<input type="submit" class="gradient-button" value="Chọn" id="book" name="book">
										</form>
									</div>
									<div class="more-information">
										<p>Stylish and individually designed room featuring a satellite TV, mini bar and a 24-hour room service menu.</p>
										<p><strong>Đồ dùng trong phòng:</strong> Safety Deposit Box, Air Conditioning, Desk, Ironing Facilities, Seating Area, Heating, Shower, Bath, Hairdryer, Toilet, Bathroom, Pay-per-view Channels, TV, Telephone</p>
										<!-- <p><strong>Bed Size(s):</strong> 1 Double </p> -->
										<p><strong>Kích thước phòng:</strong>  16 m<sup>2</sup></p>
									</div>
								</li>
								<!--//room-->
							</ul>
						</article>
					</section>
					<!--//availability-->
					
					<!--description-->
					<section id="description" class="tab-content">
						<article>
							<h1>Chung</h1>
							<div class="text-wrap">	
								<p>Khách sạn Best Ipsum có hơn 1.000 phòng, dãy phòng và căn hộ được thiết kế sang trọng, mỗi phòng đều có các tác phẩm nghệ thuật độc đáo. Chỗ ở tại khách sạn bao gồm máy lạnh trong tất cả các phòng, phòng tắm riêng có gương sưởi, máy sấy tóc, vòi hoa sen, Wi-Fi BT Openzone, tiện nghi pha cà phê và trà, đồ vệ sinh miễn phí, khăn trải giường Ai Cập, TV LCD màn hình phẳng với tầm nhìn miễn phí, bàn làm việc, dịch vụ phòng 24 giờ.</p>
							</div>
							
							<h1>Giờ nhận phòng</h1>
							<div class="text-wrap">	
								<p>Từ 15:00 giờ </p>
							</div>
							
							<h1>Giờ trả phòng</h1>
							<div class="text-wrap">	
								<p>Trước 12:00 giờ </p>
							</div>
							
							<h1>Chính sách hủy phòng</h1>
							<div class="text-wrap">	
								<p>Chính sách hủy khác nhau tùy theo loại phòng. Vui lòng kiểm tra các <a href="user_terms_of_service.html">điều kiện phòng </a>khi chọn phòng của bạn. </p>
							</div>
							
							<h1>Chính sách giành cho trẻ em</h1>
							<div class="text-wrap">	
								<p><strong>Miễn phí!</strong> Với tất cả trẻ em dưới 140 cm.<br /><br />Tất cả trẻ em trên 140 cm đều được áp dụng chính sách dành cho người lớn<br /></p>
							</div>
							
							<h1>Thú cưng</h1>
							<div class="text-wrap">	
								<p>Thú cưng được chấp nhận. Phí có thể được áp dụng, hãy liên hệ với chủ nhà</p>
							</div>
						</article>
					</section>
					<!--//description-->
					
					<!--facilities-->
					<section id="facilities" class="tab-content">
						<article>
							<h1>Cơ sở vật chất</h1>
							<div class="text-wrap">	
								<ul class="three-col">
									<li>Nhà bếp</li>
									<li>Phòng tắm</li>
									<li>Khăn tắm</li>
									<li>Beachfront</li>
									<li>Hotspots</li>
									<li>Exhibition/convention floor</li>
									<li>Restaurant</li>
									<li>Room service - full menu</li>
									<li>Courtyard</li>
									<li>Lounges/bars</li>
									<li>Laundry/Valet service</li>
									<li>Airport Shuttle Service</li>
									<li>Complimentary breakfast</li>
									<li>Valet cleaning</li>
									<li>Car hire</li>
								</ul>
							</div>
							
							<h1>Địa điểm lân cận</h1>
							<div class="text-wrap">	
								<p>Gần trung tâm, chợ, công an phường, các tụ điểm vui chơi,...</p>
							</div>
							
							<h1>Mạng Internet</h1>
							<div class="text-wrap">	
								<p><strong>Miễn phí!</strong> Wifi có sẵn trong khu vực và hoàn toàn miễn phí</p>
							</div>
							
							<h1>Nơi đỗ xe</h1>
							<div class="text-wrap">	
								<p><strong>Miễn phí!</strong> Nơi đỗ xe được bố trí miễn phí </p>
							</div>
						</article>
					</section>
					<!--//facilities-->
					
					<!--location-->
					<!-- <section id="location" class="tab-content">
						<article> -->
							<!--map-->
								<!-- <div class="gmap" id="map_canvas"></div> -->
							<!--//map-->
						<!-- </article> -->
					<!-- </section> -->
					<!--//location-->
					
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
							<h1>Đánh giá của du khách</h1>
							<ul class="reviews">
								<!--review-->
								<li>
									<figure class="left"><img src="uploads/avatar/avatar.jpg" alt="avatar" /></figure>
									<address><span>Tên du khách</span><br /><br />22/06/2012</address>
									<div class="pro">
										<p class="stars">
											<!-- <img src="user/images/ico/star-rating-off.png" alt="" /> -->
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</p>
									</div>
									<div class="con"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi, inventore.</p></div>
								</li>
								<!--//review-->
								<!--review-->
								<li>
									<figure class="left"><img src="uploads/avatar/avatar.jpg" alt="avatar" /></figure>
									<address><span>Tên du khách</span><br /><br />22/06/2012</address>
									<div class="pro">
										<p class="stars">
											<!-- <img src="user/images/ico/star-rating-off.png" alt="" /> -->
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</p>
									</div>
									<div class="con"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi, inventore.</p></div>
								</li>
								<!--//review-->
								<!--review-->
								<li>
									<figure class="left"><img src="uploads/avatar/avatar.jpg" alt="avatar" /></figure>
									<address><span>Tên du khách</span><br /><br />22/06/2012</address>
									<div class="pro">
										<p class="stars">
											<!-- <img src="user/images/ico/star-rating-off.png" alt="" /> -->
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</p>
									</div>
									<div class="con"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi, inventore.</p></div>
								</li>
								<!--//review-->
								<!--review-->
								<li>
									<figure class="left"><img src="uploads/avatar/avatar.jpg" alt="avatar" /></figure>
									<address><span>Tên du khách</span><br /><br />22/06/2012</address>
									<div class="pro">
										<p class="stars">
											<!-- <img src="user/images/ico/star-rating-off.png" alt="" /> -->
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</p>
									</div>
									<div class="con"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi, inventore.</p></div>
								</li>
								<!--//review-->
								<!--review-->
								<li>
									<figure class="left"><img src="uploads/avatar/avatar.jpg" alt="avatar" /></figure>
									<address><span>Tên du khách</span><br /><br />22/06/2012</address>
									<div class="pro">
										<p class="stars">
											<!-- <img src="user/images/ico/star-rating-off.png" alt="" /> -->
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</p>
									</div>
									<div class="con"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi, inventore.</p></div>
								</li>
								<!--//review-->
							</ul>
						</article>
					</section>
					<!--//reviews-->
				</section>
				<!--//hotel content-->
				
				<!--sidebar-->
				<aside class="right-sidebar">
					<!--hotel details-->
					<article class="hotel-details clearfix">
						<h1>Tên homestay 
							<span class="stars">
								<!-- <img src="user/images/ico/star-rating-off.png" alt="" /> -->
								<img src="user/images/ico/star.png" alt="" />
								<img src="user/images/ico/star.png" alt="" />
								<img src="user/images/ico/star.png" alt="" />
								<img src="user/images/ico/star.png" alt="" />
							</span>
						</h1>
						<span class="address">Hà Nội</span>
						<div class="description">
							<p>The Best Ipsum hotel  features over 1,000 luxuriously appointed, individually styled rooms, suites and apartments, each containing unique works of art. </p>
						</div>
						<div class="image-item">
							<ul>
								<li>
									<img src="uploads/homestay/img1.jpg" alt="" width="50" height="50" />
									<a href="uploads/homestay/img1.jpg" class="image-overlay" rel="prettyPhoto[gallery2]"></a>
								</li>
								<li>
									<img src="uploads/homestay/img2.jpg" alt="" width="50" height="50" />
									<a href="uploads/homestay/img2.jpg" class="image-overlay" rel="prettyPhoto[gallery2]"></a>
								</li>
								<li>
									<img src="uploads/homestay/img3.jpg" alt="" width="50" height="50" />
									<a href="uploads/homestay/img3.jpg" class="image-overlay" rel="prettyPhoto[gallery2]"></a>
								</li>
								<li>
									<img src="uploads/homestay/img4.jpg" alt="" width="50" height="50" />
									<a href="uploads/homestay/img4.jpg" class="image-overlay" rel="prettyPhoto[gallery2]"></a>
								</li>
								<li>
									<img src="uploads/homestay/img5.jpg" alt="" width="50" height="50" />
									<a href="uploads/homestay/img5.jpg" class="image-overlay" rel="prettyPhoto[gallery2]"></a>
								</li>
							</ul>
						</div>
					</article>
					<!--//hotel details-->

					<!--Ads-->
					<article class="default clearfix">
						<img src="uploads/Ads/ad.png" alt="">
					</article>
					<!--//Ads-->

					<!-- Booking?-->
					<article class="default clearfix order">
						<h2>Phòng đã chọn</h2>
						<div>
							<table>
							<tr>
								<th>Loại phòng</th>
								<th>Số lượng</th>
								<th>Giá</th>
								<th>Thay đổi</th>
							</tr>
							<tr>
								<td>Phòng 1 giường đơn</td>
								<td>
									<input style="width: 30px;height: 10px;border-radius: unset;" min="0" type="number" name="number_room" id="number_room" value="1">
								</td>
								<td>200.000đ</td>
								<td><a href="#">Xóa</a></td>
							</tr>
							<tr>
								<th colspan="2">Tổng</th>
								<td colspan="2">200.000đ</td>
							</tr>

						</table>
						<a href="user_booking_step_1.html" class="gradient-button" title="Book">Thanh toán</a>
						</div>	
					</article>
					<!--// Booking?-->

					<!--Popular hotels in the area-->
					<article class="default clearfix">
						<h2>Bạn có thể quan tâm</h2>
						<ul class="popular-hotels">
							<li>
								<a href="#">
									<h3>Tên homestay
										<span class="stars">
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>Từ <span class="price">100.000đ <small>/ Đêm</small></span></p>
									<p>Hà Nội</p>
								</a>
							</li>
							<li>
								<a href="#">
									<h3>Tên homestay
										<span class="stars">
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>Từ <span class="price">100.000đ <small>/ Đêm</small></span></p>
									<p>Hà Nội</p>
								</a>
							</li>
							<li>
								<a href="#">
									<h3>Tên homestay
										<span class="stars">
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>Từ <span class="price">100.000đ <small>/ Đêm</small></span></p>
									<p>Hà Nội</p>
								</a>
							</li>
							<li>
								<a href="#">
									<h3>Tên homestay
										<span class="stars">
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>Từ <span class="price">100.000đ <small>/ Đêm</small></span></p>
									<p>Hà Nội</p>
								</a>
							</li>
							
						</ul>
						<a href="user_hot_deals.html" title="Show all" class="show-all">Show all</a>
					</article>
					<!--//Popular hotels in the area-->
					
					<!--Deal of the day-->
					<article class="default clearfix">	
						<h2>Hỗ trợ đặt phòng?</h2>
						<p>Gọi cho nhóm dịch vụ khách hàng của chúng tôi theo số dưới đây để nói chuyện với một trong những cố vấn của chúng tôi, những người sẽ giúp bạn với tất cả các nhu cầu kỳ nghỉ của bạn.</p>
						<p class="number">1800 1989</p>
					</article>
					<!--//Deal of the day-->
				</aside>
				<!--//sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection