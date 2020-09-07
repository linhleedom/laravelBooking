@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Detail user</a>
				</li>
			</ul>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Detail : {{$user->name}}</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Ảnh Đại Diện:</label>
							  <div class="controls">
								<img style="border-radius: 50%;width: 70px;height: 70px; padding-top: 3px;" src="{{$user->avatar}}" alt="">
							  </div>
							</div>   
							<div class="control-group">
							  <label class="control-label" for="name">Tên:</label>
							  <div class="controls">
								<input type="text"id="name" value="{{$user->name}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="address">Địa Chỉ:</label>
							  <div class="controls">
								<input type="text"id="address" value="{{$user->address_detail}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="email">Email:</label>
							  <div class="controls">
								<input type="text" id="email" value="{{$user->email}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="address">Số Điện Thoại:</label>
							  <div class="controls">
								<input type="text" id="address" value="{{$user->phone}}">
							  </div>
							</div> 
							
							<div class="control-group">
							  <label class="control-label" for="ds">Số Tk:</label>
							  <div class="controls">
								 <input type="text" value="{{$user->bank_number}}">
							  </div>
							</div> 
							<div class="form-actions">
							  <a href="{{url('/admin/khachhang/danhsach')}}" class="btn btn-primary">OK</a>
							</div>
						  </fieldset>
						</form>   
					</div>
			</div>
		</div>
	</div>
@endsection