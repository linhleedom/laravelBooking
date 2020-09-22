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
		<li><a href="#">Quản Lí Slide</a></li>
		<li>
			<i class="icon-angle-right"></i>
			<a href="#">Thùng rác</a>
		</li>
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
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Danh Sách Slide đã xóa</h2>
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
						  <th style="text-align: center">Slogan</th>
						  <th style="text-align: center">Slogan2</th>
						  <th style="text-align: center">Hoạt Động</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($slide3 as $tl)
					<tr>
						<td style="text-align: center">{{$tl->id}}</td>
						<td style="text-align: center"><img width="70px" height="80px" src="{{$tl->url}}" alt=""></td>
						<td style="text-align: center">{{$tl->slogan}}</td>
						<td style="text-align: center">{{$tl->slogan2}}</td>
						<td style="text-align: center">
							<!-- <a href="{{url('/admin/QLSlide/edit')}}/{{$tl->id}}" class="btn btn-success">Edit</a> -->
							<a class="btn btn-success" href="{{url('/admin/QLSlide/untrash')}}/{{$tl->id}}" onclick="return confirm('Bạn Muốn Khôi Phục?');">
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