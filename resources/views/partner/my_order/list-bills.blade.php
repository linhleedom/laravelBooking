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
								<table id="example" class="display">
									<thead>
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
									</thead>
									<tbody>
										<tr>
											<td>Lorem.</td>
											<td>Porro?</td>
										</tr>
										<tr>
											<td>Amet.</td>
											<td>Quo.</td>
										</tr>
										<tr>
											<td>Assumenda.</td>
											<td>Perspiciatis.</td>
										</tr>
										<tr>
											<td>Quasi.</td>
											<td>Rem?</td>
										</tr>
										<tr>
											<td>Tempore!</td>
											<td>Libero!</td>
										</tr>
										<tr>
											<td>Distinctio.</td>
											<td>Ut.</td>
										</tr>
									</tbody>
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
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
@endsection
@section('script1')
$(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "data/arrays.txt"
    } );
} );
@endsection