@extends('admin.layout.index')
@section('content')
	<noscript>
		<div class="alert alert-block span10">
			<h4 class="alert-heading">Warning!</h4>
			<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
		</div>
	</noscript>
	<!-- start: Content -->
	<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="#">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Dashboard</a></li>
	</ul>
	<div class="row-fluid" style="margin-top: 80px;padding:0 100px;">	

		<a class="quick-button metro yellow span2" href="{{url('/admin/khachhang/danhsach')}}">
			<i class="icon-group"></i>
			<p>Users</p>
			<span class="badge">{{$user->count()}}</span>
		</a>
		<a class="quick-button metro blue span2" href="{{url('/admin/booking/danhsach')}}" >
			<i class="icon-shopping-cart"></i>
			<p>Orders</p>
			<span class="badge">{{$bill->count()}}</span>
		</a>
		<a class="quick-button metro red span2" href="{{url('/admin/QLSlide/danhsach')}}" >
			<i class="icon-picture"></i>
			<p>Slides</p>
			<span class="badge">{{$slide->count()}}</span>
		</a>
		<a class="quick-button metro pink span2" href="{{url('/admin/QLBlog/danhsach')}}">
			<i class="icon-file"></i>
			<p>Blogs</p>
			<span class="badge">{{$blog->count()}}</span>
		</a>
		<a class="quick-button metro green span2" href="{{url('/admin/homestay/ListHT')}}">
			<i class="icon-home"></i>
			<p>Home Stay</p>
			<span class="badge">{{$homestay->count()}}</span>
		</a>
		<!-- <div class="clearfix"></div> -->					
	</div><!--/row-->
	</div>
@endsection