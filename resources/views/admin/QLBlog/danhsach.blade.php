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
		<li><a href="#">Blog</a></li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Blog</h2>
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
						  <th style="text-align: center">Avatar</th>
						  <th style="text-align: center">Tiêu Đề</th>
						  <th>Ngày viết</th>
						  <th>Ngày cập nhật</th>
						  <th style="text-align: center">Trạng Thái</th>
						  <th style="text-align: center">Chi Tiết</th>
						  <th style="text-align: center">Hoạt Động</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($blog as $tl)
					<tr>
						<td style="text-align: center">{{$tl->id}}</td>
						<td style="text-align: center"><img width="70px" src="{{$tl->photo}}" alt=""></td>
						<td>{{$tl->title}}</td>
						<td class="center">{{$tl->created_at}}</td>
						<td class="center">{{$tl->updated_at}}</td>
						<td style="text-align: center">
							@if($tl->status == 1)
							<p class="label label-important">Public</p>
							@else
							<p class="label label-primary">Ẩn</p>
							@endif
						</td>
						<td style="text-align: center">
							<a href="{{url('/admin/QLBlog/detail')}}/{{$tl->id}}" class="btn btn-success">Detail</a>
						</td>
						<td style="text-align: center">
							<a class="btn btn-info" href="{{url('/admin/QLBlog/edit')}}/{{$tl->id}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{url('/admin/QLBlog/delete')}}/{{$tl->id}}">
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