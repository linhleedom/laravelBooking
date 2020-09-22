@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Trash</a></li>
			</ul>
			@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}}
							@endforeach
						</div>
					@endif

					@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
					@endif
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List</h2>
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
								  <th style="text-align: center">Ảnh Đại Diện</th>
								  <th style="text-align: center">Tên</th>
								  <th style="text-align: center">Ngày Update</th>
								  <th style="text-align: center">Email</th>
								  <th style="text-align: center">Phone</th>
								  <th style="text-align: center">Level</th>
								  <th style="text-align: center">Hoạt Động</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($user as $tl)
						  	
							<tr>
								<td style="text-align: center"><img style="border-radius: 50%;width: 50px;height: 50px; padding-top: 3px;" src="{{$tl->avatar}}" alt=""></td>
								<td>{{$tl->name}}</td>
								<td>{{$tl->updated_at}}</td>
								<td>{{$tl->email}}</td>
								<td style="text-align: center">{{$tl->phone}}</td>
								<td style="text-align: center">
									@if($tl->permision==0)
									<p class="badge red">Admin</p>
									@elseif($tl->permision==1)
									 <p class="badge green">Partner</p>
									@elseif($tl->permision==2)
									<p class="badge orange">User</p>
								
									@endif
								</td>
								<td style="text-align: center">
									<a class="btn btn-danger" href="{{url('admin/khachhang/untrash')}}/{{$tl->id}} " onclick="return confirm('Bạn Muốn Khôi Phục Đối Tượng?');">
											Khôi Phục 
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