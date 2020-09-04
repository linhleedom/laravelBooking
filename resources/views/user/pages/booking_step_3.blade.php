@extends("user.master")

@section('title')
Booking Checkout
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
						<li>Check out finish</li>                                  
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth">
						<form id="booking" method="post" action="booking" class="booking">
							<fieldset>
								<h3><span>02 </span>Đặt phòng thành công</h3>
								<div class="text-wrap">
									<p>Cảm ơn bạn. Đặt phòng của bạn bây giờ đã được xác nhận.</p>
								</div>
								
								<h3>Thông tin khách hàng</h3>
								<div class="text-wrap">
									<div class="output">
										<p>Họ tên khách hàng:</p>
										<p>{{$bill->name}}</p>
										<p>Địa chỉ email: </p>
										<p>{{$bill->email}}</p>
										<p>Số điện thoại:</p>
										<p>{{$bill->phone}}</p>
									</div>
								</div>
							
								<h3>Yêu cầu đặc biệt</h3>
								<div class="text-wrap">
									<p>{{$bill->note}}</p>
								</div>
								
								<h3>Thanh toán</h3>
								<div class="text-wrap">
									<h5>Khách hàng sẽ <strong class="dark">thanh toán trực tiếp</strong> tại Homestay<br /><br /></h5>
									<p><strong class="dark">Mọi thông tin chi tiết đã được chúng tôi gửi đến hòm thư email của bạn</strong></p>
								</div>
								<br /><br />
								<a href="{{route('userHomePage')}}" class="gradient-button">Trang chủ</a>
							</fieldset>
						</form>
					
					</section>
				<!--//three-fourth content-->
			
				<!--right sidebar-->
				<aside class="right-sidebar">
					<!--Booking details-->
					<article class="booking-details clearfix order-booking-step-1 order-booking-step-3">
						<h1>{{$bill->order->first()->product->homestay->name}}
							<span class="stars">
								<span class="point">{{$bill->order->first()->product->homestay->point}}</span>
							</span>
						</h1>
						<span class="address">{{$bill->order->first()->product->homestay->province->name}}</span><br/>
						<span class="address">{{$bill->order->first()->product->homestay->district->name}}</span>
						@foreach($bill->order as $order)
							<div class="booking-info">
								<h6>Tên phòng</h6>
								<p>{{ucfirst($order->product->name)}}</p>
								<h6>Loại phòng</h6>
								<p>{{$order->product->roomType->name}}</p>
								<h6>Phù hợp với: <span>{{$order->product->roomType->capacity}} người</span></h6>
								<h6 class="price-text">Giá: <span class="price">{{ number_format( $order->product->prices*(100-$order->product->discount)/100,0,',','.' ) }}đ</span></h6>
							</div>
						@endforeach
						<div class="price">
							<p class="total">Tổng tiền: <span class="payment">{{ number_format( $bill->payments,0,',','.' ) }}đ</span></p>
							<p class="total">Tổng số phòng: <span class="payment">{{$bill->order->count()}}</span></p>
							<p class="total">Ngày nhận phòng: <span class="payment"><i>{{date( "d-m-Y", strtotime($bill->order->first()->date_start))}}</i> </span></p>
							<p class="total">Ngày trả phòng: <span class="payment"> <i>{{date( "d-m-Y", strtotime($bill->order->first()->date_end))}}</i> </span></p>
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