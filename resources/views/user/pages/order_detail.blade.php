@extends("user.master")

@section('title')
My Account
@endsection

@section('script')
    $(document).ready(function() {
        $('#star').raty({
            score    : 3,
            click: function(score, evt) {
            alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
        }
        });
    });
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
						<li><a href="#" title="My Account">My Account</a></li>                                    
					</ul>
					<!--//crumbs-->
				
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth">
				
					<h1>My account</h1>
					
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li><a href="#MyHistorys" title="Bookings History">Lịch sử đặt phòng</a></li>
							<li><a href="#MyBookings" title="My Booking">Phòng đang đặt</a></li>
							<li><a href="#MySettings" title="Settings">Cài đặt tài khoản</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					
					<!--My Bookings-->
					<section id="MyHistorys" class="tab-content">
						<!--booking-->
						<article class="bookings">
							<h1><a href="#">Tên Homestay</a></h1>
							<div class="b-info">
								<table>
									<tr>
										<th>Loại phòng</th>
										<td>1 giường đơn</td>
									</tr>
									<tr>
										<th>Số lượng phòng</th>
										<td>1 phòng</td>
									</tr>
									<tr>
										<th>Ngày nhận phòng</th>
										<td>23-05-20</td>
									</tr>
									<tr>
										<th>Ngày trả phòng</th>
										<td>30-05-20</td>
									</tr>
									<tr>
										<th>Tổng tiền thanh toán</th>
										<td><strong>200.000đ</strong></td>
									</tr>
									<tr>
										<th>Trạng thái đặt phòng</th>
										<td><strong>Đã Hủy</strong></td>
									</tr>
								</table>
							</div>
							
							<div class="actions">
								<a href="#" class="gradient-button">Book again</a>
								<a href="#" class="gradient-button">Remove from list</a>
							</div>
						</article>
						<!--//booking-->
						
						<!--booking-->
						<article class="bookings">
							<h1><a href="#">Tên Homestay</a></h1>
							<div class="b-info">
								<table>
									<tr>
										<th>Loại phòng</th>
										<td>1 giường đơn</td>
									</tr>
									<tr>
										<th>Số lượng phòng</th>
										<td>1 phòng</td>
									</tr>
									<tr>
										<th>Ngày nhận phòng</th>
										<td>23-05-20</td>
									</tr>
									<tr>
										<th>Ngày trả phòng</th>
										<td>30-05-20</td>
									</tr>
									<tr>
										<th>Tổng tiền thanh toán</th>
										<td><strong>200.000đ</strong></td>
									</tr>
									<tr>
										<th>Trạng thái đặt phòng</th>
										<td><strong>Đã hoàn thành</strong></td>
									</tr>
									<tr>
										<th>Đánh giá</th>
										<td>
											<form action="">
												<!--Star rating-->
												<dt>Star rating</dt>
												<dd style="display: block; height: auto;">
													<div id="star" data-rating="3" style="cursor: pointer; width: 110px;">
														<img src="user/images/ico/star-rating-on.png" alt="1" title="bad">&nbsp;
														<img src="user/images/ico/star-rating-on.png" alt="2" title="poor">&nbsp;
														<img src="user/images/ico/star-rating-on.png" alt="3" title="regular">&nbsp;
														<img src="user/images/ico/star-rating-off.png" alt="4" title="good">&nbsp;
														<img src="user/images/ico/star-rating-off.png" alt="5" title="gorgeous">
														<input type="hidden" name="score" value="3">
													</div>
												</dd>
												<!--//Star rating-->
												<textarea name="comment" id="comment" cols="10" rows="3"></textarea>
												<input type="submit" class="gradient-button" id="addRating" name="addRating" value="Gửi">
											</form>
										</td>
									</tr>
								</table>
							</div>
							
							<div class="actions">
								<a href="#" class="gradient-button">Book again</a>
								<a href="#" class="gradient-button">Remove from list</a>
							</div>
						</article>
						<!--//booking-->
						
						<!--booking-->
						<article class="bookings">
							<h1><a href="#">Tên Homestay</a></h1>
							<div class="b-info">
								<table>
									<tr>
										<th>Loại phòng</th>
										<td>2 giường đơn</td>
									</tr>
									<tr>
										<th>Số lượng phòng</th>
										<td>1 phòng</td>
									</tr>
									<tr>
										<th>Ngày nhận phòng</th>
										<td>23-05-20</td>
									</tr>
									<tr>
										<th>Ngày trả phòng</th>
										<td>30-05-20</td>
									</tr>
									<tr>
										<th>Tổng tiền thanh toán</th>
										<td><strong>200.000đ</strong></td>
									</tr>
									<tr>
										<th>Trạng thái đặt phòng</th>
										<td><strong>Đã hoàn thành</strong></td>
									</tr>
									<tr>
										<th>Đánh giá</th>
										<td>
											<!--Star rating-->
											<dt>Star rating</dt>
											<dd style="display: block; height: auto;">
												<div id="star" data-rating="3" style="cursor: pointer; width: 130px;">
													<img src="user/images/ico/star-rating-on.png" alt="1" title="bad">&nbsp;
													<img src="user/images/ico/star-rating-on.png" alt="2" title="poor">&nbsp;
													<img src="user/images/ico/star-rating-on.png" alt="3" title="regular">&nbsp;
													<img src="user/images/ico/star-rating-off.png" alt="4" title="good">&nbsp;
													<img src="user/images/ico/star-rating-off.png" alt="5" title="gorgeous">
													<input type="hidden" name="score" value="3">
												</div>
											</dd>
											<!--//Star rating-->
											<textarea readonly="readonly" name="comment" id="comment" cols="10" rows="3">dfdgfdgfgf</textarea>
										</td>
									</tr>
								</table>
							</div>
							
							<div class="actions">
								<a href="#" class="gradient-button">Book again</a>
								<a href="#" class="gradient-button">Remove from list</a>
							</div>
						</article>
						<!--//booking-->
					</section>
					<!--//My Bookings-->
					
					
					<!--MyReviews-->
					<section id="MyBookings" class="tab-content">
						<!--booking-->
						<article class="bookings">
							<h1><a href="#">Tên Homestay</a></h1>
							<div class="b-info">
								<table>
									<tr>
										<th>Loại phòng</th>
										<td>1 giường đơn</td>
									</tr>
									<tr>
										<th>Số lượng phòng</th>
										<td>1 phòng</td>
									</tr>
									<tr>
										<th>Ngày nhận phòng</th>
										<td>23-05-20</td>
									</tr>
									<tr>
										<th>Ngày trả phòng</th>
										<td>30-05-20</td>
									</tr>
									<tr>
										<th>Tổng tiền thanh toán</th>
										<td><strong>200.000đ</strong></td>
									</tr>
									<tr>
										<th>Trạng thái đặt phòng</th>
										<td><strong>Đặt phòng thành công</strong></td>
									</tr>
								</table>
							</div>
							
							<div class="actions">
								<a href="#" class="gradient-button">Change booking</a>
								<a href="#" class="gradient-button">Cancel booking</a>
								<!-- <a href="#" class="gradient-button">View confirmation</a>
								<a href="#" class="gradient-button">Print confirmation</a> -->
							</div>
						</article>
						<!--//booking-->
					</section>
					<!--//MyReviews-->
					
					<!--MySettings-->
					<section id="MySettings" class="tab-content">
						<article class="mysettings">
							<h1>Thông tin của bạn</h1>
							<table>
								<tr>
									<th>Họ và Tên</th>
									<td>Lê Duy Linh
										<!--edit fields-->
										<div class="edit_field" id="field1">
											<form action="">
												<label for="new_name">Nhập tên mới: </label>
												<input type="text" id="name"/>
												<input type="submit" value="Cập nhật" name="editUserName" class="gradient-button" id="editUserName"/>
												<a href="#">Hủy</a>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field1" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>E-mail: </th>
									<td>mail@google.com
										<!--edit fields-->
										<div class="edit_field" id="field2">
											<form action="">
												<label for="new_name">Nhập địa chỉ email mới: </label>
												<input type="text" id="name"/>
												<input type="submit" value="Cập nhật" name="editEmail" class="gradient-button" id="editEmail"/>
												<a href="#">Hủy</a>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field2" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Password: </th>
									<td>************
										<!--edit fields-->
										<div class="edit_field" id="field3">
											<form action="">
												<label for="new_name">Nhập mật khẩu cũ: </label>
												<input type="password" id="name"/>
												<label for="new_name">Nhập mật khẩu mới: </label>
												<input type="password" id="name"/>
												<label for="new_name">Nhập lại mật khẩu mới: </label>
												<input type="password" id="name"/>
												<input type="submit" value="Cập nhật" name="editPassword" class="gradient-button" id="editPassword"/>
												<a href="#">Hủy</a>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field3" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Số điện thoại: </th>
									<td>1800 1989
										<!--edit fields-->
										<div class="edit_field" id="field4">
											<form action="">
												<label for="new_name">Nhập số điện thoại mới: </label>
												<input type="text" id="name"/>
												<input type="submit" value="Cập nhật" name="editPhone" class="gradient-button" id="editPhone"/>
												<a href="#">Hủy</a>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field4" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Ảnh đại diện: </th>
									<td>
										<img src="uploads/avatar/avatar.jpg" alt="avatar">
										<!--edit fields-->
										<div class="edit_field" id="field5">
											<form action="" enctype="multipart/form-data">
												<label for="new_name">Chọn ảnh đại diện mới </label>
												<input type="file" id="name"/><br/>
												<input type="submit" value="Cập nhật" name="editAvatar" class="gradient-button" id="editAvatar"/>
												<a href="#">Hủy</a>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field5" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Địa chỉ: </th>
									<td>nhà 3c, Hoàng Mai, Hoàng Mai, Hà Nội
										<!--edit fields-->
										<div class="edit_field" id="field6">
											<form action="">
												<label for="address_detail">Địa chỉ(không bắt buộc):</label>
												<textarea name="" id="address_detail" cols="10" rows="3"></textarea>
												<label>Tỉnh/Thành Phố</label>
												<select>
													<option selected="selected">Chọn</option>
													<option>Hà Nội</option>
													<option>Hồ Chí Minh</option>
												</select>
												<label>Quận/Huyện</label>
												<select>
													<option selected="selected">Chọn</option>
													<option>Đông Anh</option>
													<option>Hai Bà Trưng</option>
												</select>
												<label>Phường/Xã</label>
												<select>
													<option selected="selected">Chọn</option>
													<option>Hoàng Văn Thụ</option>
													<option>Hoàng Mai</option>
												</select>
												<br/>
												<input type="submit" value="Cập nhật" name="editPhone" class="gradient-button" id="editPhone"/>
												<a href="#">Hủy</a>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field6" class="gradient-button edit">Sửa</a></td>
								</tr>
							</table>

						</article>
					</section>
					<!--//MySettings-->
					
				</section>
				<!--//three-fourth content-->
				
				<!--sidebar-->
				<aside class="right-sidebar">

					<!--Need Help Booking?-->
					<article class="default clearfix">	
						<h2>Hỗ trợ đặt phòng?</h2>
						<p>Gọi cho nhóm dịch vụ khách hàng của chúng tôi theo số dưới đây để nói chuyện với một trong những cố vấn của chúng tôi, những người sẽ giúp bạn với tất cả các nhu cầu kỳ nghỉ của bạn.</p>
						<p class="number">1800 1989</p>
					</article>
					<!--//Need Help Booking?-->
					
					<!--Ads-->
					<article class="default clearfix">
						<img src="uploads/Ads/ad.png" alt="">
					</article>
					<!--//Ads-->
					
				</aside>
				<!--//sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection