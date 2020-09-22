
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
		<li><a href="#">Quản Lí</a></li>
		<li>
			<i class="icon-angle-right"></i>
			<a href="#">Quản Lí Slide</a>
		</li>
			<li>
				<i class="icon-angle-right"></i>
				<i class="icon-edit"></i>
				<a href="#">Edit Slide</a>
			</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Slide: {{$slide->id}}</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
				</div>
				<div class="box-content">
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
					@if(session('loi'))
						<div class="alert alert-success">
							{{session('loi')}}
						</div>
					@endif
					<form class="form-horizontal" action="{{url('/admin/QLSlide/edit')}}/{{$slide->id}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					  <fieldset>
					  	<div class="control-group">
						  <label class="control-label" for="date01">Ảnh:</label>
						  <div class="controls">
							<input type="file" id="date01" name="url"><br>
							<img width="180px" height="160px" src="{{$slide->url}}" alt="">
						  </div>
						</div>   
						<div class="control-group">
						  <label class="control-label" for="slogan1">Slogan:</label>
						  <div class="controls">
							<input type="text" id="slogan1" name="slogan" value="{{$slide->slogan}}">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="slogan2">Slogan2:</label>
						  <div class="controls">
							<input type="text" id="slogan2" name="slogan2" value="{{$slide->slogan2}}">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="order">Thứ Tự Slide:</label>
						  <div class="controls">
							<!-- <input type="text" id="slogan2" name="slogan2" value="{{$slide->slogan2}}"> -->
							<select name="order" id="order">
								@foreach($sli as $tl)
								<option value="{{$tl->order}}"
									 @if($tl->order == $slide->order) selected="selected"; @endif>
									 Vị trí số:{{$tl->order}}
								</option>
								 @endforeach
							</select>
						  </div>
						</div>
						<div class="control-group">
							<label class="control-label" for="status">Public BV:</label>
						  	<label class="controls radio-inline">
								<input type="radio" name="status" value="0" id="status" 
									@if($slide->status == 0)
									{{"checked"}}
									@endif
								>Ko
							</label>
							<label class="controls radio-inline">
								<input type="radio" name="status" value="1" id="status"
									@if($slide->status == 1)
									{{"checked"}}
									@endif
								>Có
							</label>
						</div>
						<div class="form-actions">
						 <button type="submit" class="btn btn-primary">Edit</button>
						 <a href="{{url('/admin/QLSlide/danhsach')}}" class="btn">Quay Lại</a>
						</div>
					  </fieldset>
					</form> 
					 
				</div>
			</div>
		</div>
	</div>
@endsection
