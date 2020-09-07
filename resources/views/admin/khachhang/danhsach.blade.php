@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">User</a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List Members</h2>
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
								  <th style="text-align: center">Ngày Đăng Kí</th>
								  <th style="text-align: center">Email</th>
								  <th style="text-align: center">Phone</th>
								  <th style="text-align: center">Level</th>
								  <th style="text-align: center">Hoạt Động</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($user as $tl)
						  	@if($tl->permision==0)
							<tr>
								<td style="text-align: center"><img style="border-radius: 50%;width: 50px;height: 50px; padding-top: 3px;" src="{{$tl->avatar}}" alt=""></td>
								<td>{{$tl->name}}</td>
								<td>{{$tl->created_at}}</td>
								<td>{{$tl->email}}</td>
								<td style="text-align: center">{{$tl->phone}}</td>
								<td style="text-align: center">
									<p class="badge red">Admin</p>
								</td>
								<td>
								 	@if(Auth::user()->id==$tl->id)
										<a href="{{url('/admin/khachhang/detail')}}/{{$tl->id}}" class="btn btn-primary">Detail</a>
										<a href="{{url('admin/khachhang/edit')}}/{{$tl->id}}" class="btn btn-primary">Edit</a>
									@else
										<a href="{{url('/admin/khachhang/detail')}}/{{$tl->id}}" class="btn btn-primary">Detail</a>
										<a href="{{url('admin/khachhang/edit')}}/{{$tl->id}}" class="btn btn-primary">Edit</a>
										<a class="btn btn-danger" href="{{url('admin/khachhang/delete')}}/{{$tl->id}}">
											<i class="halflings-icon white trash"></i> 
										</a>
									@endif
								</td>
							</tr>
							@endif
							@endforeach

							@foreach($user as $tl)
						  	@if($tl->permision==1)
							<tr>
								<td style="text-align: center"><img width="60px" src="{{$tl->avatar}}" alt=""></td>
								<td>{{$tl->name}}</td>
								<td>{{$tl->created_at}}</td>
								<td>{{$tl->email}}</td>
								<td style="text-align: center">{{$tl->phone}}</td>
								<td style="text-align: center">
									<p class="badge green">Partner</p>
								</td>
								<td> 
									@if(Auth::user()->id==$tl->id)
										<a href="{{url('/admin/khachhang/detail')}}/{{$tl->id}}" class="btn btn-primary">Detail</a>
										<a href="{{url('admin/khachhang/edit')}}/{{$tl->id}}" class="btn btn-primary">Edit</a>
									@else	
										<a href="{{url('/admin/khachhang/detail')}}/{{$tl->id}}" class="btn btn-primary">Detail</a>
										<a class="btn btn-danger" href="{{url('admin/khachhang/delete')}}/{{$tl->id}}">
											<i class="halflings-icon white trash"></i> 
										</a>
									@endif
								</td>
							</tr>
							@endif
							@endforeach

							@foreach($user as $tl)
						  	@if($tl->permision==2)
							<tr>
								<td style="text-align: center"><img width="60px" src="{{$tl->avatar}}" alt=""></td>
								<td>{{$tl->name}}</td>
								<td>{{$tl->created_at}}</td>
								<td>{{$tl->email}}</td>
								<td style="text-align: center">{{$tl->phone}}</td>
								<td style="text-align: center">	
									<p class="badge orange">User</p>
								</td>
								<td>
								 	@if(Auth::user()->id==$tl->id)
										<a href="{{url('/admin/khachhang/detail')}}/{{$tl->id}}" class="btn btn-primary">Detail</a>
										<a href="{{url('admin/khachhang/edit')}}/{{$tl->id}}" class="btn btn-primary">Edit</a>
									@else	
										<a href="{{url('/admin/khachhang/detail')}}/{{$tl->id}}" class="btn btn-primary">Detail</a>
										<a class="btn btn-danger" href="{{url('admin/khachhang/delete')}}/{{$tl->id}}">
											<i class="halflings-icon white trash"></i> 
										</a>
									@endif
								</td>
							</tr>
							@endif
							@endforeach
						  </tbody>
					  </table>            
					</div>
				</div>
			</div>
			<a href="{{url('/admin/khachhang/them')}}" class="btn btn-primary">Thêm User</a>
	</div>

@endsection