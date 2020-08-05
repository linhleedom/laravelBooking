@extends("user.master")

@section('title')
Travel Your Booking
@endsection

@section('script')
	$(document).ready(function(){
		$(".form").hide();
		$(".form:first").show();
		$(".f-item:first").addClass("active");
		$(".f-item:first span").addClass("checked");

		$("#address").autocomplete({
			source: "{{url('/autoComplete')}}",
		});
	});
@endsection

@section('home')
class="active"
@endsection

@section('content')
    <!--slider-->
    <section class="slider clearfix">
		<div id="sequence">
			<ul>
				@foreach($slide as $slideVal)
					<li>
						<div class="info animate-in">
							<h2>{{$slideVal->slogan}}</h2><br />
							<p>Thủ tục đăng ký nhanh gọn</p>
						</div>
						<img class="main-image animate-in" src="{{$slideVal->url}}" alt="" />
					</li>
				@endforeach
			</ul>
		</div>
	</section>
	<!--//slider-->
	
	<!--search-->
	<div class="main-search">
		<form id="main-search" method="get" action="{{url('/search')}}">
			<div class="forms">
				<!--form hotel-->
				<div class="form" id="form1">
					<!--column-->
					<div class="column location">
						<h4><span>01 </span>Địa điểm</h4>
						<div class="f-item">
							<label for="address">Chọn địa điểm bạn muốn đến</label>
							<input type="text" placeholder="" id="address" name="address" />
						</div>
					</div>
					<!--//column-->
					
					<!--column-->
					<div class="column twins">
						<h4><span>02 </span> Thời gian</h4>
						<div class="f-item datepicker">
							<label for="datepicker1">Nhận phòng</label>
							<div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="datepicker1" /></div>
						</div>
						<div class="f-item datepicker">
							<label for="datepicker2">Trả phòng</label>
							<div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="datepicker2" /></div>
						</div>
					</div>
					<!--//column-->
				
					<!--column-->
					<div class="column triplets">
						<h4><span>03 </span>Thông tin khác</h4>
						<div class="f-item spinner">
							<label for="num_room">Số phòng</label>
							<input type="text" placeholder="" value="1" id="num_room" name="num_room" />
						</div>
						<div class="f-item spinner">
							<label for="num_adult">Số người lớn</label>
							<input type="text" placeholder="" value="2" id="num_adult" name="num_adult" />
						</div>
						<div class="f-item spinner">
							<label for="num_chil">Trẻ em</label>
							<input type="text" placeholder="" value="0" id="num_chil" name="num_chil" />
						</div>
					</div>
					<!--//column-->
				</div>	
				<!--//form hotel-->
			</div>
			<input type="submit" value="Tìm kiếm" class="search-submit" id="search-submit" />
		</form>
	</div>
	<!--//search-->
	
	<!--main-->
	<div class="main" role="main">
		<div class="wrap clearfix">
			<!--top destinations-->
			<section class="destinations clearfix full">
				<h1>Top Homestay được yêu thích </h1>
				@foreach($homestayTopRate as $homestayTopRateVal)
					<!--column-->
					@if($homestayTopRateVal->product->max('discount') == 0)
						<article class="one-fourth">
					@else
						<article class="one-fourth promo">
						<div class="ribbon-small">- {{$homestayTopRateVal->product->max('discount')}}%</div>
					@endif
						<figure>
							<a href="user_room_detail.html" title="">
								<img src="{{$homestayTopRateVal->avatar}}" alt="" width="270" height="152" />
							</a>
						</figure>
						<div class="details">
							<div class="homestay_info">
								<a href="user_room_detail.html" title="View all" class="gradient-button">Chi tiết</a>
								<h5>{{$homestayTopRateVal->name}}</h5>
								<span class="count">{{$homestayTopRateVal->point}}  <img src="user/images/ico/star.png" alt="">
								</span>
							</div>
							<div class="ribbon">
								<div class="half hotel">
									<a href="user_room_detail.html" title="View all">
										<span class="small">Giá từ</span>
										<span class="price">{{$homestayTopRateVal->product->min('prices')}}</span>
									</a>
								</div>
								<div class="half flight">
									<a href="user_room_detail.html" title="View all">
										<span class="location">{{$homestayTopRateVal->province->name}}</span>
									</a>
								</div>
							</div>
						</div>
					</article>
					<!--//column-->
				@endforeach
			</section>
			<!--//top destinations-->

			<!--top destinations-->
			<section class="destinations clearfix full">
				<h1>Sạch sẽ thoải mái, phù hợp cho lưu trú dài ngày</h1>
				@foreach($homestay as $homestayVal)
					<!--column-->
					@if($homestayVal->product->max('discount') == 0)
						<article class="one-fourth">
					@else
						<article class="one-fourth promo">
						<div class="ribbon-small">- {{$homestayVal->product->max('discount')}}%</div>
					@endif
						<figure>
							<a href="user_room_detail.html" title="">
								@foreach($homestayVal->image->take(1) as $image)
									<img src="{{$image->url}}" alt="" width="270" height="152" />
								@endforeach
							</a>
						</figure>
						<div class="details">
							<div class="homestay_info">
								<a href="user_room_detail.html" title="View all" class="gradient-button">Chi tiết</a>
								<h5>{{$homestayVal->name}}</h5>
								<span class="count">{{$homestayVal->point}}  <img src="user/images/ico/star.png" alt=""></span>
							</div>
							<div class="ribbon">
								<div class="half hotel">
									<a href="user_room_detail.html" title="View all">
										<span class="small">Giá từ</span>
										<span class="price">{{$homestayVal->product->min('prices')}}</span>
									</a>
								</div>
								<div class="half flight">
									<a href="user_room_detail.html" title="View all">
										<span class="location">{{$homestayVal->province->name}}</span>
									</a>
								</div>
							</div>
						</div>
					</article>
					<!--//column-->
				@endforeach
			</section>
			<!--//top destinations-->
			
			<!--info boxes-->
			<section class="boxes clearfix">
				<!--column-->
				<article class="one-fourth">
					<h2>Chọn lọc cẩn thận</h2>
					<p>Tất cả các cuốn sách Khách sạn du lịch của bạn đáp ứng các tiêu chí lựa chọn nghiêm ngặt. Mỗi khách sạn được chọn riêng và không thể mua.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Mô tả chi tiết</h2>
					<p>Để cho bạn một ấn tượng chính xác về khách sạn, chúng tôi nỗ lực để xuất bản các mô tả khách sạn minh bạch, cân bằng và chính xác.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Thông tin độc quyền</h2>
					<p>Các chuyên gia của chúng tôi luôn cập nhật thêm về khách sạn của chúng tôi, môi trường xung quanh và các hoạt động được cung cấp gần đó.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Dịch vụ tận tình</h2>
					<p>Đội ngũ Travels của chúng tôi sẽ phục vụ cho các yêu cầu đặc biệt của bạn. Chúng tôi cung cấp lời khuyên chuyên môn để tìm đúng khách sạn.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Đảm bảo giá tốt nhất</h2>
					<p>Chúng tôi cung cấp các khách sạn tốt nhất với giá tốt nhất. Nếu bạn tìm thấy cùng loại phòng vào cùng ngày rẻ hơn ở nơi khác, chúng tôi sẽ hoàn lại tiền chênh lệch. Đảm bảo, và nhanh chóng.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Đặt phòng an toàn</h2>
					<p>Đặt hệ thống đặt chỗ du lịch của bạn được bảo mật và thẻ tín dụng và thông tin cá nhân của bạn được mã hóa. <br /> Chúng tôi làm việc theo tiêu chuẩn cao và đảm bảo quyền <strong>riêng tư</strong> của bạn.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Lợi ích cho khách sạn</h2>
					<p>Chúng tôi cung cấp một mô hình hiệu quả về chi phí, mạng lưới hơn 5000 đối tác và dịch vụ quản lý tài khoản được cá nhân hóa để giúp bạn tối ưu hóa doanh thu của mình.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Giải đáp thắc mắc?</h2>
					<p>Gọi cho chúng tôi theo số <em>1-555-555-555</em> để được tư vấn riêng, phù hợp cho kỳ nghỉ hoàn hảo của bạn hoặc gửi tin nhắn cho chúng tôi với câu hỏi đặt phòng khách sạn của bạn.<br /></p>
				</article>
				<!--//column-->
			</section>
			<!--//info boxes-->
		</div>
	</div>
	<!--//main-->
@endsection