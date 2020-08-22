
@extends('admin.layout.index')
@section('content')
	<!-- start: Content -->
	<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.html">Home</a>
				<i class="icon-angle-right"></i> 
			</li>
			<li>
				<i class="icon-edit"></i>
				<a href="#">Slide</a>
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
					<form class="form-horizontal" action="{{url('/admin/QLSlide/edit')}}/{{$slide->id}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					  <fieldset>
						<div class="control-group">
						  <label class="control-label" for="slogan1">Slogan:</label>
						  <div class="controls">
							<input type="text" id="slogan1" name="slogan" value="{{$slide->slogan}}">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date01">Ảnh:</label>
						  <div class="controls">
							<input type="file" id="date01" name="url" value="{{$slide->url}}">
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