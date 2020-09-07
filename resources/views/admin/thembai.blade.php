@extends('admin.layout.index')
@section('script')
	<script>
		$(document).ready(function(){
			$("#matp").change(function(){
				var matp= $(this).val();
				$.get("{{url('/admin/ajax/them')}}/"+matp,function(data){
					$("#maqh").html(data);
					
				});
			});
		});
	</script>
@endsection
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
				<a href="#">Thêm Bài Viết</a>
			</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm bài Viết</h2>
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
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					  <fieldset>
						<div class="control-group">
						  <label class="control-label" for="typeahead">Tiêu Đề:</label>
						  <div class="controls">
							<input style="width: 500px; height: 30px;" type="text" id="typeahead" name="title">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="description">Mô tả:</label>
						  <div class="controls">
							<input style="width: 500px; height: 30px;" type="text" id="description" name="description">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date01">Ảnh:</label>
						  <div class="controls">
							<input type="file" id="date01" name="photo">
						  </div>
						</div>   
						<div class="control-group">
						  <label class="control-label" for="matp">Tỉnh/Thành phố:</label>
						  <div class="controls">
							<select name="matp" id="matp">
								<option value="">-----------chọn thành phố-----------</option>
								@foreach($province as $tl)
								<option value="{{$tl->matp}}">{{$tl->name}}</option>
								@endforeach
							</select>
						  </div>
						</div>   
						<div class="control-group">
						  <label class="control-label" for="maqh">Quận/huyện:</label>
						  <div class="controls">
							<select name="maqh" id="maqh">
								<option selectted="selected" value="">-----------chọn qh-----------</option>
								@foreach($district as $tlu)
								<option value="{{$tlu->maqh}}">{{$tlu->name}}</option>
								@endforeach
								
								
							</select>
						  </div>
						</div>   
						<div class="control-group">
						  <label class="control-label" for="editor">Bài viết:</label>
						  <div class="controls">
							<textarea id="editor" name="post"></textarea>
						 </div>
						 <script type="text/javascript">
							 var	editor=CKEDITOR.replace( 'editor',
								{
									language:'vi',
								filebrowserBrowseUrl : 'admin_asset/ckfinder/ckfinder.html',
								filebrowserImageBrowseUrl : 'admin_asset/ckfinder/ckfinder.html?type=Images',
								filebrowserFlashBrowseUrl : 'admin_asset/ckfinder/ckfinder.html?type=Flash',
								filebrowserUploadUrl : 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
								filebrowserImageUploadUrl : 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
								filebrowserFlashUploadUrl : 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
								});
						</script>
						</div>
						<div class="control-group">
						  	<label class="control-label" for="status">Public BV:</label>
						  	<label class="controls radio-inline">
								<input type="radio" name="status" value="0" id="status" checked="checked">Ẩn	
							</label>	
							<label class="controls radio-inline">
								<input type="radio" name="status" value="1" id="status">Public
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
@endsection
