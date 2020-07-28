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
						<h1 style="text-align: center;text-transform: uppercase;">Thông tin phòng Homestay của bạn</h1>
						<form id="booking" method="post" action="booking-step2.html" class="booking ">
							<fieldset>
								<h3><span>01 </span>Hạng mục homestay</h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label>Loại căn hộ</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>HOMESTAY</option>
										</select>
									</div>
									<div class="f-item custom-item">
										<label for="">Trạng thái của phòng</label>
										<input type="checkbox" id="status" name="status"  value=""/> &nbsp <b>Ẩn/Hiện</b>
									</div>
								</div>
								
								<h3 style="margin-top: 20px;"><span>02</span> Chi tiết chỗ nghỉ</h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label for="">Loại phòng</label>
										<input type="text" id="" name="" />
									</div>
									<div class="f-item custom-item">
										<label for="">Số lượng phòng</label>
										<input type="number" id="" name="" />
									</div>
								</div>

								<div class="row twins">
									<div class="f-item custom-item">
										<label for="">Số lượng khách có thể lưu trú</label>
										<input type="number" id="" name="" />
									</div>
									<div class="f-item custom-item">
										<label for="address">Kích thước phòng (m<sup>2</sup>)</label>
										<input type="text" id="address" name="address" />
									</div>

									<div class="f-item custom-item checkbox">
										<h4>Mô tả đồ dùng trong phòng </h4>
										<input type="checkbox" name="check" id="check" value="" />
										<label>Safety Deposit Box</label> <br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Air Conditioning</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Desk</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Ironing Facilities</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Seating Area</label><br> <br>
										
										<input type="checkbox" name="check" id="check" value="" />
										<label>Heating</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Shower</label><br> <br>
										
									</div>
									<div class="f-item custom-item">
										<label>Mô tả khác: </label>
										<textarea rows="10" cols="10"></textarea>
									</div>
								</div>
								
								<div class="row twins">
									<h3 style="margin-top: 20px;"><span>03</span> Tiện ích có tại chỗ nghỉ</h3>
									<div class="f-item custom-item checkbox">
										<input type="checkbox" name="check" id="check" value="" />
										<label>Wifi miễn phí</label> <br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Trạm sạc xe điện</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Chỗ đậu xe trong khuôn viên</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Hồ bơi</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Điều hòa</label><br> <br>
										
										<input type="checkbox" name="check" id="check" value="" />
										<label>Hệ thống sưởi</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Bồn tắm nóng/bể sục (jacuzzi)</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Sân thượng/hiên</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Sân vườn</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Phòng xông hơi</label><br> <br>

										<input type="checkbox" name="check" id="check" value="" />
										<label>Quầy bar</label><br> <br>
									</div>
								</div>

								<h3 style="margin-top: 20px;"><span>04</span> Quy định chung</h3>

								<div class="row twins">
									<div class="f-item custom-item">
										<label>Cho phép hút thuốc</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>Không</option>
											<option>Có</option>
										</select>
									</div>

									<div class="f-item custom-item">
										<label>Cho phép đem vật nuôi</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>Không</option>
											<option>Có</option>
										</select>
									</div>

									<div class="f-item custom-item">
										<label>Cho phép trẻ em</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>Không</option>
											<option>Có</option>
										</select>
									</div>

									<div class="f-item custom-item">
										<label>Cho phép tiệc tùng/sự kiện</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>Không</option>
											<option>Có</option>
										</select>
									</div>
									
								</div>
								<div class="row twins">
									<div class="f-item custom-item">
										<label>Nhận phòng từ</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>14:00</option>
											<option>15:00</option>
										</select>
									</div>
									
									<div class="f-item custom-item">
										<label>Trả phòng từ</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>12:00</option>
											<option>13:00</option>
										</select>
									</div>
								</div>

								<h3 style="margin-top: 20px;"><span>05</span> Ảnh </h3>

								<div class="row twins">
									<div class="f-item custom-item">
										<label>Chọn ảnh chỗ nghỉ của quý khách</label>
										<form action="/action_page.php">
											<input type="file" id="files" name="files" multiple><br><br>
										</form>
									</div>
								</div>
								<h3 style="margin-top: 20px;"><span>06</span> Giá phòng </h3>

								<div class="row twins">
									<div class="f-item custom-item">
										<label>Nhập giá phòng (VNĐ) :</label>
										<form action="/action_page.php">
											<input type="text" id="" name="" ><br><br>
										</form>
									</div>
									<div class="f-item custom-item">
										<label>Giảm giá :</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>5%</option>
											<option>10%</option>
											<option>20%</option>
											<option>25%</option>
											<option>50%</option>
										</select>
									</div>																
								</div>
								<div class="row twins">
									<div class="f-item custom-item">
										<label>Phí hoa hồng dịch vụ :</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>5%</option>
											<option>10%</option>
											<option>15%</option>
										</select>
									</div>								
								</div>

								<h3 style="margin-top: 20px;"><span>07</span> Chính sách hủy đặt phòng </h3>

								<div class="row twins">
									<div class="f-item custom-item">
										<label>Khách có thể hủy đặt phòng miễn phí  trước ngày nhận phòng bao nhiêu ngày?</label>
										<select>
											<option selected="selected">Chọn</option>
											<option>1 ngày</option>
											<option>5 ngày</option>
											<option>14 ngày</option>
										</select>
									</div>
								</div>	
							</fieldset>							
							<input type="submit" class="gradient-button" value="Cập nhật" id="update" >
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