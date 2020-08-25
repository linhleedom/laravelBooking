@extends('partner.master')
@section('main')
    <!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
                        <li><a href="{{url('partner/trangchu')}}" title="Home">Home</a></li>
                        <li><a title="Danh mục">Danh mục</a></li>
                        <li><a title="Thêm">Thêm</a></li>                                
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<!-- <ul class="top-right-nav">
						<li><a href="#" title="Back to results">Quay lại</a></li>
					</ul> -->
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth form-booking">
						<h1>Chọn mục</h1>
						<form id="booking" method="post" action="" class="booking">
							<fieldset style="text-align: center;">
								<a href="{{asset('partner/add-homestay')}}"><b class="gradient-button">Thêm Homestay</b></a>
								<a href="{{asset('partner/add-room')}}"><b class="gradient-button">Thêm phòng</b></a>
							</fieldset>
						</form>
					</section>
				<!--//three-fourth content-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection