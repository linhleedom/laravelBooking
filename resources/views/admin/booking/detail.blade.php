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
				<a href="detailbooking.html">Detail Booking</a>
			</li>
		</ul>			
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Detail Booking</h2>
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
						  <label class="control-label" for="typeahead">Home Stay:</label>
						  <div class="controls">
							<input type="text" id="typeahead" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="address">Địa chỉ:</label>
						  <div class="controls">
							<input type="text" id="address" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="price">Giá Phòng:</label>
						  <div class="controls">
							<input type="text" id="price" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="many">Số Lượng:</label>
						  <div class="controls">
							<input type="number" id="many" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="customer">Người Book:</label>
						  <div class="controls">
							<input type="text" id="customer" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="number">Số Điện Thoại:</label>
						  <div class="controls">
							<input type="text" id="typeahead" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="email">Email:</label>
						  <div class="controls">
							<input type="email" id="email" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date01">Ngày Book:</label>
						  <div class="controls">
							<input type="text" class="input-xlarge datepicker" id="date01" value="02/16/20">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date02">Ngày Nhận Phòng:</label>
						  <div class="controls">
							<input type="text" class="input-xlarge datepicker" id="date02" value="02/16/20">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date03">Ngày Trả:</label>
						  <div class="controls">
							<input type="text" class="input-xlarge datepicker" id="date03" value="02/16/20">
						  </div>
						</div>        
						<div class="control-group">
						  <label class="control-label" for="img">Hình Ảnh:</label>
						  <div class="controls">
							<input type="file" id="img" >
						  </div>
						</div>
						<div class="form-actions control-group">
						  <a href="booking.html" class="btn btn-success"><i class="halflings-icon white ok"></i></a>
						</div>
					  </fieldset>
					</form>   
				</div>
			</div>
		</div>
	</div>
@endsection