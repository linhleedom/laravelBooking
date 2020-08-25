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
				<a href="#">Detail</a>
			</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Detail: {{$blog->id}}</h2>
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
						  <label class="control-label" for="typeahead">Tiêu Đề:</label>
						  <div class="controls">
							<input type="text" id="typeahead" name="title" value="{{$blog->title}}">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="date01">Ảnh:</label>
						  <div class="controls">
						  	<img width="120px" src="{{$blog->photo}}" alt="">
						  </div>
						</div>   
						<div class="control-group">
						  <label class="control-label" for="description">Mô tả:</label>
						  <div class="controls">
							<input type="text" id="description" name="description" value="{{$blog->description}}">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="xaid">XaId:</label>
						  <div class="controls">
							<input type="number" id="xaid" name="xaid" value="{{$blog->xaid}}">
						  </div>
						</div>   
						<div class="control-group">
						  <label class="control-label" for="editor">Bài viết:</label>
						  <div class="controls">
							<textarea id="editor" name="post" rows="10" cols="30">{{$blog->post}}</textarea>
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
								<input type="radio" name="status" value="0" id="status" 
									@if($blog->status == 0)
									{{"checked"}}
									@endif
								>Ko
							</label>
							<label class="controls radio-inline">
								<input type="radio" name="status" value="1" id="status"
									@if($blog->status == 1)
									{{"checked"}}
									@endif
								>Có
							</label>
						</div>
						<div class="form-actions">
						 <a href="{{url('/admin/QLBlog/danhsach')}}" class="btn btn-success">OK</a>
						</div>
					  </fieldset>
					</form> 
					 
				</div>
			</div>
		</div>
	</div>
@endsection