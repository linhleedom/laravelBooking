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
						  <th style="text-align: center">ID</th>
						  <th style="text-align: center">Avatar</th>
						  <th style="text-align: center">Name</th>
						  <th style="text-align: center">Keyword</th>
						  <th style="text-align: center">Thành phố</th>
						  <th style="text-align: center">Trạng Thái</th>
						  <th style="text-align: center">Hoạt Động</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($homestay as $tl)
					<tr>
						<td style="text-align: center">{{$tl->id}}</td>
						<td style="text-align: center"><img width="80px" src="{{$tl->avatar}}" alt=""></td>
						<td>{{$tl->name}}</td>
						
						<td>{{$tl->keyword}}</td>
						<td>
							@foreach($province as $tlu)
								@if($tl->maqh== $tlu->id)
								{{$tlu->name}}
								@endif
							@endforeach
							({{$tl->maqh}})
						</td>
						<td style="text-align: center">
							@if($tl->status == 1)
							<p  class="label label-important">Public</p>
							@else
							<p class="label label-primary">Ẩn</p>
							@endif
						</td>
						<td style="text-align: center">
							<a href="{{url('/admin/homestay/products')}}/{{$tl->id}}" class="btn btn-success">List</a>
							<a class="btn btn-primary" href="{{url('/admin/homestay/edit')}}/{{$tl->id}}">
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