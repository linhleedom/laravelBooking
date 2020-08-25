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
		<li><a href="#">List Home Stay</a></li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Danh Sách HomeStay</h2>
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
						  <th>Name</th>
						  <th>Keyword</th>
						  <th>Thành phố</th>
						  <th>Trạng Thái</th>
						  <th>Hoạt Động</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($homestay as $tl)
					<tr>
						<td>{{$tl->id}}</td>
						<td><img width="80px" src="{{$tl->avatar}}" alt=""></td>
						<td>{{$tl->name}}</td>
						
						<td>{{$tl->keyword}}</td>
						<td>{{$tl->maqh}}</td>
						<td>
							@if($tl->status == 1)
							<p>Public</p>
							@else
							<p>Ẩn</p>
							@endif
						</td>
						<td class="center">
							<a href="{{url('/admin/homestay/products')}}/{{$tl->id}}" class="btn btn-success">List</a>
							<a class="btn btn-info" href="{{url('/admin/homestay/edit')}}/{{$tl->id}}">
								<i class="halflings-icon white edit"></i>  
							</a>
						</td>
					</tr> 
					@endforeach
				  </tbody>
			  </table>            
			</div>
		</div>
	
	</div>
		<a class="btn btn-primary" href="{{url('/admin/homestay/tienich')}}">T/I</a>
		<a class="btn btn-primary" href="{{url('/admin/homestay/roomstyle')}}">Style</a>
	</div>
@endsection