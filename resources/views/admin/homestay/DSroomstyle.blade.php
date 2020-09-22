@extends('admin.layout.index')
@section('content')
	<!-- start: Content -->
	<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="#">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li>
			<a href="#">HomeStay</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Danh Sách Style</a></li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Danh Sách Style</h2>
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
						  <th style="text-align: center">ID</th>
						  <th style="text-align: center">Name</th>
						  <th style="text-align: center">Sức chứa</th>
						  <th style="text-align: center">Trạng Thái</th>
						  <th style="text-align: center">Hoạt Động</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($DSRS as $tl)
					<tr>
						<td style="text-align: center">{{$tl->id}}</td>
						
						<td style="text-align: center">{{$tl->name}}</td>
						
						<td style="text-align: center">{{$tl->capacity}}</td>
						
						<td style="text-align: center">
							@if($tl->status == 1)
							<p  class="label label-important">Public</p>
							@else
							<p class="label label-primary">Ẩn</p>
							@endif
						</td>
						<td style="text-align: center">
							<a href="{{url('/admin/homestay/xoaRS')}}/{{$tl->id}}" class="btn btn-success" onclick="return confirm('Bạn Muốn Xóa?');">Xóa</a>
							
						</td>
					</tr> 
					@endforeach
				  </tbody>
			  </table>            
			</div>
		</div>
	
	</div>
		<a class="btn btn-primary" href="{{url('/admin/homestay/roomstyle')}}">Thêm RoomStyle</a>
		
	</div>
@endsection