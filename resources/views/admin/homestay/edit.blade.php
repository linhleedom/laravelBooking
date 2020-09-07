
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
				<i class="icon-edit"></i>
				<a href="#">Edit Home Stay</a>
			</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit trạng thái: {{$homestay->id}}</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					  <fieldset>
						
						<div class="control-group">
							<label class="control-label" for="status">Public BV:</label>
						  	<label class="controls radio-inline">
								<input type="radio" name="status" value="0" id="status" 
									@if($homestay->status == 0)
									{{"checked"}}
									@endif
								>Ân
							</label>
							<label class="controls radio-inline">
								<input type="radio" name="status" value="1" id="status"
									@if($homestay->status == 1)
									{{"checked"}}
									@endif
								>Public
							</label>
						</div>
						<div class="form-actions">
						 	<button type="submit" class="btn btn-primary">Edit</button>
							<button type="reset" class="btn btn-danger">Reset</button></a>
						</div>
					  </fieldset>
					</form> 
					 
				</div>
			</div>
		</div>
	</div>
@endsection