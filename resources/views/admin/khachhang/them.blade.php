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
				<a href="form.html">User</a>
			</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm User</h2>
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
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					  <fieldset>
						<div class="control-group">
						  <label class="control-label" for="typeahead">Tên:</label>
						  <div class="controls">
							<input type="text" id="typeahead" name="name" placeholder="Nhập Tên">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date01">PassWord:</label>
						  <div class="controls">
							<input type="password" id="date01" name="password" placeholder="Nhập Password">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date02">PassWordAgain:</label>
						  <div class="controls">
							<input type="password" id="date02" name="passwordagain" placeholder="Nhập PasswordAgain">
						  </div>
						</div>   
						<div class="control-group">
						  <label class="control-label" for="description">Email:</label>
						  <div class="controls">
							<input type="email" id="description" name="email" placeholder="Nhập Email">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="xaid">PhoneNumber:</label>
						  <div class="controls">
							<input type="text" id="xaid" name="phone" placeholder="Nhập Phone">
						  </div>
						</div>   
						<div class="control-group ">
							<label class="control-label" for="status">Level:</label>
							<label class="controls radio-inline">
								<input type="radio" name="permision" value="0" id="status">Admin
							</label>
							<label class="controls radio-inline">
								<input type="radio" name="permision" value="1" id="status">Partner
							</label>
							<label class="controls radio-inline">	
								<input type="radio" name="permision" value="2" id="status">User
							</label>
						</div>
						<div class="form-actions">
						 	<button type="submit" class="btn btn-primary">ADD</button>
						  	<button type="reset" class="btn">Hủy</button>
						</div>
					  </fieldset>
					</form> 
					 
				</div>
			</div>
		</div>
	</div>
	<!-- <script>
		var editor = CKEDITOR.replace('editor');
							
	</script> --> 
	
@endsection