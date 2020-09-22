@extends('partner.master')
@section('title')
Khách Hàng
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
						<li><a  title="Khách hàng">Khách hàng thân thiết</a></li>                      
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth" style="width: 100%">
					<div style="text-align: center; font-size: 4.5em;">Tổng hợp hóa đơn của khách hàng</div>
					<section class="full">
						<div class="deals clearfix">
							{{csrf_field()}}
								<div colspan="2"style="color: #32df5d;
												border-color: #ebccd1;
												width: 100%;">
								</div>
								<table id="example" class="display" style="width:100%">
									<thead>
										<tr>
											<th>STT</th>
											<th>Email</th>
											<th>Số điện thoại</th>
											<th>Tổng đơn hàng đã xong</th>
											<th>Tổng tiền thanh toán</th>
											<th>Tổng đơn đang đặt</th>
											<th>Số đơn hủy</th>
										</tr>
									</thead>
									<?php $i=0; ?>
									@foreach ($listBill  as $list_BillVal)                      
									<?php $i++; ?>
									@if ($list_BillVal->status == 2)                                    
										<tr class="alert_success">
									@elseif($list_BillVal->status == 1)                                    
										<tr class="alert_danger">
									@elseif($list_BillVal->status == 0)                                 
										<tr class="alert_warning">
									@endif
										<td>{{$i}}</td>
										<td style="text-align: left">{{$list_BillVal->email}}</td>
										<td style="text-align: left">{{$list_BillVal->phone}}</td>
										<td>
											<?php $total = 0 ; ?>
											@foreach ($payment as $totalPayment )
												@if($totalPayment->email == $list_BillVal->email)
													<?php $total ++; ?>
												@endif
											@endforeach
											{{$total}}
											
										</td>
										<td style="text-align: right">
											<?php $total = 0 ; ?>
											@foreach ($payment as $totalPayment )
												@if($totalPayment->email == $list_BillVal->email)
													<?php $total += $totalPayment->payments; ?>
												@endif
											@endforeach
											{{ number_format( $total,0,',','.' ) }}đ
										</td>
										<td>
											<?php $total = 0 ; ?>
											@foreach ($payment2 as $totalPayment )
												@if($totalPayment->email == $list_BillVal->email && $totalPayment->status == 0)
													<?php $total ++; ?>
												@endif
											@endforeach
											{{$total}}
										</td>
										<td>
											<?php $total = 0 ; ?>
											@foreach ($payment2 as $totalPayment )
												@if($totalPayment->email == $list_BillVal->email && $totalPayment->status == 1)
											<?php $total ++; ?>
												@endif
											@endforeach
											{{$total}}
										</td>
									</tr>
									@endforeach
								</table>
								{{-- <div class="bottom-nav">
									<!--pager-->
										{{ $list_Bill->withQueryString()->links('vendor.pagination.custom') }}
									<!--//pager-->
								</div> --}}
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
{{-- <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script> --}}
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
@endsection
@section('script1')
$(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "data/objects.txt",
        "columns": [			
            { "data": "id" },
            { "data": "user_id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "phone" },
            { "data": "note" },
            { "data": "status" },
            { "data": "payments" }
        ]
    } );
} );
@endsection