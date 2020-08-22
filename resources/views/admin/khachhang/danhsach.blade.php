@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="custumer.html">Customer</a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
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
								  <th>Ảnh Đại Diện</th>
								  <th>Tên</th>
								  <th>Ngày Đăng Kí</th>
								  <th>Email</th>
								  <th>Phone</th>
								  <th>Level</th>
								  <th>Hoạt Động</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($user as $tl)
							<tr>
								<td>{{$tl->avatar}}</td>
								<td>{{$tl->name}}</td>
								<td class="center">{{$tl->created_at}}</td>
								<td class="center">{{$tl->email}}</td>
								<td class="center">{{$tl->phone}}</td>
								<td class="center">
									@if($tl->permision==0)
									{{"admin"}}
									@elseif($tl->permision==1)
									{{"partner"}}
									@else
									{{"user"}}
									@endif
								</td>
								<td class="center">
									<a href="#" class="btn btn-success">Detail</a>
									<a href="{{url('admin/khachhang/edit')}}/{{$tl->id}}" class="btn btn-primary">Edit</a>
									<a class="btn btn-danger" href="{{url('admin/khachhang/delete')}}/{{$tl->id}}">
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
			<a href="{{url('/admin/khachhang/them')}}" class="btn btn-primary">Thêm User</a>
	</div>

@endsection