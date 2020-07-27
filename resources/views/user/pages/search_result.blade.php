@extends("user.master")

@section('title')
Search Result
@endsection

@section('script')
$(document).ready(function() {
		$('dt').each(function() {
			var tis = $(this), state = false, answer = tis.next('dd').hide().css('height','auto').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
		
		$('.view-type li:first-child').addClass('active');
		
		$('#star').raty({
			score    : 3,
			click: function(score, evt) {
			alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
		  }
		});
	});

	$(window).load(function () {
	var maxHeight = 0;
			
	$(".three-fourth .one-fourth").each(function(){
	if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});
	$(".three-fourth .one-fourth").height(maxHeight);	
	});	
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
						<li><a href="#" title="Hà Nội">Hà Nội</a></li>
						<li>Search results</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->
			
				<!--sidebar-->
				<aside class="left-sidebar">
					<article class="search-left">
						<form action="">
							<div class="row-1">
								<div class="f-item">
									<label for="destination1">Địa điểm</label>
									<input type="text" placeholder="" id="destination1" name="destination" />
								</div>
							</div>
							<div class="row-2">
								<div class="f-item datepicker">
									<label for="datepicker1">Nhận phòng</label>
									<div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="datepicker1" /></div>
								</div>
								<div class="f-item datepicker">
									<label for="datepicker2">Trả Phòng</label>
									<div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="datepicker2" /></div>
								</div>
							</div>
							<div class="row-3">
								<div class="f-item spinner">
									<label for="spinner1">Số phòng</label>
									<input type="text" placeholder="" id="spinner1" name="spinner1" />
								</div>
								<div class="f-item spinner">
									<label for="spinner2">Người lớn</label>
									<input type="text" placeholder="" id="spinner2" name="spinner1" />
								</div>
								<div class="f-item spinner">
									<label for="spinner3">Trẻ em</label>
									<input type="text" placeholder="" id="spinner3" name="spinner1" />
								</div>
							</div>
							<input type="submit" value="Tìm kiếm" class="search-submit" id="search-submit" />
						</form>

					</article>
					<article class="refine-search-results">
						<h2>Tìm kiếm theo</h2>
						<dl>
							<!--Price-->
							<dt>Giá</dt>
							<dd>
								<div class="checkbox">
									<input type="checkbox" id="ch1" name="price" />
									<label for="ch1">40.000 - 120.000 </label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch2" name="price" />
									<label for="ch2">120.000 - 300.000</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch3" name="price" />
									<label for="ch3">300.000 - 600.000</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch4" name="price" />
									<label for="ch5">Trên 600.000</label>
								</div>
							</dd>
							<!--//Price-->
							
							<!--Tiện ích-->
							<dt>Tiện ích</dt>
							<dd>
								<div class="checkbox">
									<input type="checkbox" id="ch6" name="accommodation" />
									<label for="ch6">Free wifi</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch7" name="accommodation" />
									<label for="ch7">Đỗ xe miễn phí</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch8" name="accommodation" />
									<label for="ch8">Điều hòa</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch9" name="accommodation" />
									<label for="ch9">Ăn sáng</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch10" name="accommodation" />
									<label for="ch10">Có bể bơi</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch11" name="accommodation" />
									<label for="ch11">Cho thuê xe đạp</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch12" name="accommodation" />
									<label for="ch12">Gần chợ</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch13" name="accommodation" />
									<label for="ch13">Gần đồn công an</label>
								</div>
							</dd>
							<!--//Tiện ích-->

							<!--xếp hạng thao địa điểm-->
							<dt>Xếp hạng theo điểm</dt>
							<dd>
								<div class="checkbox">
									<input type="checkbox" id="ch15" name="facilities" />
									<label for="ch15">1 sao</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch16" name="facilities" />
									<label for="ch16">2 sao</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch17" name="facilities" />
									<label for="ch17">3 sao</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch18" name="facilities" />
									<label for="ch18">4 sao</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch19" name="facilities" />
									<label for="ch19">5 sao</label>
								</div>
							</dd>
							<!--//xếp hạng thao địa điểm-->
							
							<!--chính sách đặt phòng-->
							<dt>Chính sách đặt phòng</dt>
							<dd>
								<div class="checkbox">
									<input type="checkbox" id="ch29" name="room-facilities" />
									<label for="ch29">Miễn phí hủy phòng</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch30" name="room-facilities" />
									<label for="ch30">Không cần thanh toán trước</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch31" name="room-facilities" />
									<label for="ch31">Đặt phòng không cần thẻ tín dụng</label>
								</div>
							</dd>
							<!--//chính sách đặt phòng-->
					
						</dl>
					</article>
				</aside>
				<!--//sidebar-->
			
				<!--three-fourth content-->
					<section class="three-fourth">
						<div class="sort-by">
							<h3>Bộ lọc</h3>
							<ul class="sort">
								<li>Phổ biết
									<a href="#" title="ascending" class="ascending">ascending</a>
									<a href="#" title="descending" class="descending">descending</a>
								</li>
								<li>Giá
									<a href="#" title="ascending" class="ascending">ascending</a>
									<a href="#" title="descending" class="descending">descending</a>
								</li>
								<li>Đánh giá 
									<a href="#" title="ascending" class="ascending">ascending</a>
									<a href="#" title="descending" class="descending">descending</a>
								</li>
							</ul>
							
							<ul class="view-type">
								<li class="grid-view"><a href="#" title="grid view">grid view</a></li>
								<li class="list-view"><a href="#" title="list view">list view</a></li>
								<li class="location-view"><a href="#" title="location view">location view</a></li>
							</ul>
						</div>
						
						<div class="deals clearfix">
							<!--deal-->
							<article class="one-fourth">
								<figure><a href="user_room_detail.html" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>Luxstay
										<span class="stars">
											<img src="user/images/ico/star-rating-off.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h1>
									<span class="address">Hà Nội  •  Phòng giường đôi</span>
									<!-- <span class="rating">200</span> -->
									<span class="price">Giá 1 đêm  <em>200.000đ</em> </span>
									<div class="description">
										<p>Overlooking the Aqueduct and Nature Park, Lorem Ipsum Hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="user_room_detail.html">chi tiết</a></p>
									</div>
									<a href="user_room_detail.html" title="Book now" class="gradient-button">Chọn phòng</a>
								</div>
							</article>
							<!--//deal-->
							<!--deal-->
							<article class="one-fourth">
								<figure><a href="user_room_detail.html" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>Luxstay
										<span class="stars">
											<img src="user/images/ico/star-rating-off.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h1>
									<span class="address">Hà Nội  •  Phòng giường đôi</span>
									<!-- <span class="rating">200</span> -->
									<span class="price">Giá 1 đêm  <em>200.000đ</em> </span>
									<div class="description">
										<p>Overlooking the Aqueduct and Nature Park, Lorem Ipsum Hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="user_room_detail.html">chi tiết</a></p>
									</div>
									<a href="user_room_detail.html" title="Book now" class="gradient-button">Chọn phòng</a>
								</div>
							</article>
							<!--//deal-->
							<!--deal-->
							<article class="one-fourth">
								<figure><a href="user_room_detail.html" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>Luxstay
										<span class="stars">
											<img src="user/images/ico/star-rating-off.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h1>
									<span class="address">Hà Nội  •  Phòng giường đôi</span>
									<!-- <span class="rating">200</span> -->
									<span class="price">Giá 1 đêm  <em>200.000đ</em> </span>
									<div class="description">
										<p>Overlooking the Aqueduct and Nature Park, Lorem Ipsum Hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="user_room_detail.html">chi tiết</a></p>
									</div>
									<a href="user_room_detail.html" title="Book now" class="gradient-button">Chọn phòng</a>
								</div>
							</article>
							<!--//deal-->
							<!--deal-->
							<article class="one-fourth">
								<figure><a href="user_room_detail.html" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>Luxstay
										<span class="stars">
											<img src="user/images/ico/star-rating-off.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h1>
									<span class="address">Hà Nội  •  Phòng giường đôi</span>
									<!-- <span class="rating">200</span> -->
									<span class="price">Giá 1 đêm  <em>200.000đ</em> </span>
									<div class="description">
										<p>Overlooking the Aqueduct and Nature Park, Lorem Ipsum Hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="user_room_detail.html">chi tiết</a></p>
									</div>
									<a href="user_room_detail.html" title="Book now" class="gradient-button">Chọn phòng</a>
								</div>
							</article>
							<!--//deal-->
							<!--deal-->
							<article class="one-fourth">
								<figure><a href="user_room_detail.html" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>Luxstay
										<span class="stars">
											<img src="user/images/ico/star-rating-off.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h1>
									<span class="address">Hà Nội  •  Phòng giường đôi</span>
									<!-- <span class="rating">200</span> -->
									<span class="price">Giá 1 đêm  <em>200.000đ</em> </span>
									<div class="description">
										<p>Overlooking the Aqueduct and Nature Park, Lorem Ipsum Hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="user_room_detail.html">chi tiết</a></p>
									</div>
									<a href="user_room_detail.html" title="Book now" class="gradient-button">Chọn phòng</a>
								</div>
							</article>
							<!--//deal-->
							<!--deal-->
							<article class="one-fourth">
								<figure><a href="user_room_detail.html" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>Luxstay
										<span class="stars">
											<img src="user/images/ico/star-rating-off.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
											<img src="user/images/ico/star.png" alt="" />
										</span>
									</h1>
									<span class="address">Hà Nội  •  Phòng giường đôi</span>
									<!-- <span class="rating">200</span> -->
									<span class="price">Giá 1 đêm  <em>200.000đ</em> </span>
									<div class="description">
										<p>Overlooking the Aqueduct and Nature Park, Lorem Ipsum Hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="user_room_detail.html">chi tiết</a></p>
									</div>
									<a href="user_room_detail.html" title="Book now" class="gradient-button">Chọn phòng</a>
								</div>
							</article>
							<!--//deal-->
							
							<!--bottom navigation-->
							<div class="bottom-nav">
								<!--back up button-->
								<a href="#" class="scroll-to-top" title="Back up">Back up</a> 
								<!--//back up button-->
								
								<!--pager-->
								<div class="pager">
									<span><a href="#">First page</a></span>
									<span><a href="#">&lt;</a></span>
									<span class="current">1</span>
									<span><a href="#">2</a></span>
									<span><a href="#">3</a></span>
									<span><a href="#">4</a></span>
									<span><a href="#">5</a></span>
									<span><a href="#">6</a></span>
									<span><a href="#">7</a></span>
									<span><a href="#">8</a></span>
									<span><a href="#">&gt;</a></span>
									<span><a href="#">Last page</a></span>
								</div>
								<!--//pager-->
							</div>
							<!--//bottom navigation-->
						</div>
					</section>
				<!--//three-fourth content-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection