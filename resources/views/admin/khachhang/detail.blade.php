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
					<a href="detailcustomer.html">Detail Customer</a>
				</li>
			</ul>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Detail Customer</h2>
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
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>   
							<div class="control-group">
							  <label class="control-label" for="name">Tên:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="name">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Ngày Tham Gia:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" value="02/16/20">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="address">Địa Chỉ:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="address">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="address">Số Điện Thoại:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="address">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="email">Email:</label>
							  <div class="controls">
								<input type="email" class="input-xlarge datepicker" id="email">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="ds">Danh sách HS:</label>
							  <div class="controls">
								 <a href="dshomestay.html"class="btn btn-primary" id="ds">Danh Sách</a>
							  </div>
							</div> 
							<div class="form-actions">
							  <a href="custumer.html" class="btn btn-primary">OK</a>
							</div>
						  </fieldset>
						</form>   
					</div>
			</div>
		</div>
	</div>
@endsection