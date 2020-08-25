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
				<a href="#">DetailHS</a>
			</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>DetailHS</h2>
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
						  <label class="control-label" for="typeahead">Tiêu Đề:</label>
						  <div class="controls">
							<input type="text" id="typeahead" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="typeahead">Người viết:</label>
						  <div class="controls">
							<input type="text" id="typeahead" >
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date01">Ngày viết:</label>
						  <div class="controls">
							<input type="text" class="input-xlarge datepicker" id="date01" value="02/16/20">
						  </div>
						</div>        
						<div class="control-group hidden-phone">
						  <label class="control-label" for="textarea2">Bài viết:</label>
						  <div class="controls">
							<textarea class="cleditor" id="textarea2" rows="3"></textarea>
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
						  <label class="control-label" for="img">Hình Ảnh:</label>
						  <div class="controls">
							<input type="file" id="img" >
						  </div>
						</div>
						<div class="form-actions control-group">
						  <a href="table.html" class="btn btn-success"><i class="halflings-icon white ok"></i>  </button></a>
						</div>
					  </fieldset>
					</form>   
				</div>
			</div>
		</div>
	</div>
@endsection