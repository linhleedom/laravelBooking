@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="#">Home</a> 
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">List Order</a></li>
		</ul>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Bill</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						  <tr>
						  	  <th>ID</th>
						  	  <th>Avatar</th>
							  <th>Tên Home Stay</th>
							  <th>Giá</th>
							  <th>Ngày Đặt</th>
							  <th>Ngày Trả</th>
							  
						  </tr>
					  </thead>   
					  <tbody>
					  	@foreach($order as $tl)
					  	
						<tr>
							<td>{{$tl->id}}</td>
							
							@foreach($product as $tlu)
							@if($tl->product_id==$tlu->id)
							<td><img width="100px" src="{{$tlu->avatar}}" alt=""></td>
							<td>{{$tlu->name}}</td>
							<td>{{$tlu->prices}}</td>
							@endif
							@endforeach

							<td>{{$tl->date_start}}</td>
							<td>{{$tl->date_end}}</td>
							
						</tr>
						
						
						@endforeach
					  </tbody>
				  </table>            
				</div>
			</div>
		
		</div>
		<a class="btn btn-primary" href="{{url('/admin/booking/danhsach')}}"><--</a>
	</div>
@endsection