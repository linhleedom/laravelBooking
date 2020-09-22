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
								<table id="example" class="display" style="width:100%">
									<thead>
										<tr>
											<th>STT</th>
											<th>Tài khoản</th>
											<th>Tên khách hàng</th>
											<th>Email</th>
											<th>Số điện thoại</th>
											<th>Yêu cầu</th>
											<th>Tổng tiền</th>
											<th>Tình trạng</th>
											<th>Thông tin</th>
											<th>Hủy phòng</th>
										</tr>
									</thead>
									<?php $i=0; ?>
									@foreach ($list_Bill  as $list_BillVal)                      
									<?php $i++; ?>
									@if ($list_BillVal->status == 2)                                    
										<tr class="alert_success">
									@elseif($list_BillVal->status == 1)                                    
										<tr class="alert_danger">
									@elseif($list_BillVal->status == 0)                                 
										<tr class="alert_warning">
									@endif
										<td>{{$i}}</td>
										@if($list_BillVal->user_id != 0)
											<td>{{$list_BillVal->user->name}}</td>
										@else											
											<td>Chưa có tài khoản</td>
										@endif
										<td>{{$list_BillVal->name}}</td>
										<td>{{$list_BillVal->email}}</td>
										<td>{{$list_BillVal->phone}}</td>
										<td>{{$list_BillVal->note}}</td>
										<td><strong>{{ number_format( $list_BillVal->payments,0,',','.' ) }}đ</strong></td>
										<td >
											@if ($list_BillVal->status == 2)                                    
												Xong
											@elseif($list_BillVal->status == 1)                                    
												Đã hủy
											@elseif($list_BillVal->status == 0)                                 
												Đã đặt phòng
											@endif
										</td>
										@if($list_BillVal->status != 0)
										<td class="function_one_bills">
											<a href="{{route('information_order', ['id' => $list_BillVal->id])}}"><img src="partner/images/ico/detail.png" alt="" width="18px" height="18px"></a>
										</td>
										<td></td>
										@elseif($list_BillVal->status == 0)
										<td class="function_bills">
											<a href="{{route('information_order', ['id' => $list_BillVal->id])}}"><img src="partner/images/ico/detail.png" alt="" width="18px" height="18px"></a>
										</td>
										<td class="function_bills">
											<a href="{{route('CancelBook', ['id'=>$list_BillVal])}}"><img src="" alt=""><img src="partner/images/ico/cancel.png" alt="" width="16px" height="16px"></a>
										</td>
										@endif
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