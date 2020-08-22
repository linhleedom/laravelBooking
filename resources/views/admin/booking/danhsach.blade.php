@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.html">Home</a> 
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">Booking</a></li>
		</ul>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Booking</h2>
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
							  <th>ID Home Stay</th>
							  <th>Ngày Book</th>
							  <th>Ngày Nhận Phòng</th>
							  <th>Ngày Trả Phòng</th>
							  <th>Hoạt Động</th>
						  </tr>
					  </thead>   
					  <tbody>
					  	@foreach($order as $tl)
						<tr>
							<td>{{$tl->id}}</td>
							<td>{{$tl->created_at}}</td>
							<td>{{$tl->date_start}}</td>
							<td>{{$tl->date_end}}</td>
							<td class="center">
								<a href="#" class="btn btn-success">Detail</a>
								<a class="btn btn-info" href="{{url('/admin/booking/edit')}}/{{$tl->bill_id }}">
									<i class="halflings-icon white edit"></i>  
								</a>
								<a class="btn btn-danger" href="#">
									<i class="halflings-icon white trash"></i> 
								</a>
							</td>
						</tr>
						@endforeach
					  </tbody>
				  </table>            
				</div>
			</div>
		
		</div>
	</div>
@endsection