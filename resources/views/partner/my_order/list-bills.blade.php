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
                        <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
						<li><a  title="Hóa đơn">Hóa đơn</a></li>                      
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth" style="width: 100%">
					<div style="text-align: center; font-size: 4.5em;">Danh sách các Hóa đơn</div>
					<section class="full">
						<div class="deals clearfix">
							{{csrf_field()}}
								<div colspan="2"style="color: #32df5d;
												border-color: #ebccd1;
												width: 100%;">
								</div>
							<table class="list-bills">
								<tr>
									<th>STT</th>
									<th>Tài khoản</th>
									<th>Tên khách hàng</th>
									<th>Email</th>
									<th>Số điện thoại</th>
									<th>Yêu cầu</th>
									<th>Tổng tiền</th>
									<th>Trạng thái đơn hàng</th>
									<th colspan="4">Thông tin</th>
								</tr>
								<?php $i=0; ?>
								@foreach ($list_Bill  as $list_BillVal)                      
								<?php $i++; ?>
								<tr>
								<td>{{$i}}</td>
									<td>{{$list_BillVal->user->name}}</td>
									<td>{{$list_BillVal->name}}</td>
									<td>{{$list_BillVal->email}}</td>
									<td>{{$list_BillVal->phone}}</td>
									<td>{{$list_BillVal->note}}</td>
									<td><strong>{{ number_format( $list_BillVal->payments,0,',','.' ) }}đ</strong></td>
									<td >
										@if ($list_BillVal->status == 2)                                    
											<a title="Sửa" class="gradient-button success custom_button_bills">Xong</a>
										@elseif($list_BillVal->status == 1)                                    
										<a title="Sửa" class="gradient-button danger custom_button_bills">Đã hủy</a>
										@elseif($list_BillVal->status == 0)                                 
											<a href="" title="Sửa" class="gradient-button  warning custom_button_bills">Đã đặt phòng</a>
										@endif
									</td>
									@if($list_BillVal->status != 0)
									<td>
										<a href="{{route('information_order', ['id' => $list_BillVal->id])}}" class="gradient-button  custom_button_bills">Thông tin</a>
									</td>
									@elseif($list_BillVal->status == 0)
									<td>
										<a href="{{route('information_order', ['id' => $list_BillVal->id])}}" class="gradient-button  custom_button_bills">Thông tin</a>
										<a href="{{route('CancelBook', ['id'=>$list_BillVal])}}" class="gradient-button danger custom_button_bills">Hủy phòng</a>
									</td>
									@endif
								</tr>
								@endforeach
							</table>
						</div>
						<div class="bottom-nav">
							<!--pager-->
								{{ $list_Bill->withQueryString()->links('vendor.pagination.custom') }}
							<!--//pager-->
						</div>
					</section>
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