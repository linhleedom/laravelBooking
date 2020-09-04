@extends('partner.master')
@section('title')
List Bills
@endsection
@section('script')
	
@endsection
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
						<li><a href="{{url('partner/trangchu')}}" title="Home">Home</a></li>	
						<li><a  title="Hóa đơn">Hóa đơn</a></li>                      
					</ul>
					<!--//crumbs-->
				
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth" style="width: 100%">
					
					<div class="deals clearfix">
						<div style="text-align: center; font-size: 4.5em;margin-bottom: 50px;">Danh sách các Hóa đơn</div>
						<!--My Bookings-->
							<section id="MyBookings" class="tab-content tab-booking">
								<!--booking-->
								<?php $i = 0 ;?>
								@foreach ($list_Bill as $list_BillVal)
								<?php $i++ ;?>
									<article class="bookings">
									<h1><a href="#">Đơn hàng thứ {{$i}}</a></h1>
										<div class="b-info">
											<table>
												<tr>
													<th>Tên Khách hàng:</th>
													<td>{{$list_BillVal->name}}</td>
												</tr>
												<tr>
													<th>Email liên hệ:</th>
													<td>{{$list_BillVal->email}}</td>
												</tr>
												<tr>
													<th>Số điện thoại:</th>
													<td>{{$list_BillVal->phone}}</td>
												</tr>
												<tr>
													<th>Trạng thái:</th>
													@if($list_BillVal->status == 0)
														<td><strong class="gradient-button warning">Đã đặt</strong></td>
													@elseif($list_BillVal->status == 1)
													<td><strong class="gradient-button danger">Hủy</strong></td>
													@elseif($list_BillVal->status == 2)
													<td><strong class="gradient-button success">Xong</strong></td>
													@endif
												</tr>
												<tr>
													<th>Tổng tiền:</th>
													<td><strong>{{ number_format( $list_BillVal->payments,0,',','.' ) }}đ</strong></td>
												</tr>
											</table>
										</div>
										
										<div class="actions">
											<a href="{{url('partner/information-order', ['id' => $list_BillVal->id])}}" class="gradient-button ">Thông tin hóa đơn</a>
											@if ($list_BillVal->status == 0)
											<a href="{{route('CancelBook', ['id'=>$list_BillVal])}}" class="gradient-button danger">Hủy phòng</a>
											@endif
										</div>
									</article>									
								@endforeach
								<div class="bottom-nav">
									<!--back up button-->
									{{-- <a href="#" class="scroll-to-top" title="Back up">Top</a>  --}}
									<!--//back up button-->
									
									<!--pager-->
										{{ $list_Bill->withQueryString()->links('vendor.pagination.custom') }}
									<!--//pager-->
								</div>
								<!--//booking-->
							</section>
						<!--//My Bookings-->
					</div>
					
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