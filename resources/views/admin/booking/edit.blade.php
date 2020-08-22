@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="editbooking.html">Edit Booking</a>
				</li>
			</ul>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Booking</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
									{{$err}} <br>
								@endforeach
							</div>
						@endif
						<form class="form-horizontal" method="POST" action="">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="name">Name:</label>
							  <div class="controls">
								<input type="text" id="name" name="name" value="{{$bill->name}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="email">Email:</label>
							  <div class="controls">
								<input type="email" id="email" name="email" value="{{$bill->email}}" >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="phone">PhoneNumber:</label>
							  <div class="controls">
								<input type="text" id="phone" name="phone" value="{{$bill->phone}}" >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="payments">Giá Bill:</label>
							  <div class="controls">
								<input type="text" id="payments" name="payments" value="{{$bill->payments}}" >
							  </div>
							</div>
							<div class="form-actions control-group">
							   <button type="submit" class="btn btn-primary">Edit</button>
							  <button type="reset" class="btn">Hủy</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div>
			</div>
	</div>
@endsection