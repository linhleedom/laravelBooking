<header>
		<div class="wrap clearfix">
			<!--logo-->
			<h1 class="logo"><a href="{{url('partner/trangchu')}}" title="Book Your Travel - home"><img src="partner/images/txt/logo.png" alt="Book Your Travel" /></a></h1>
			<!--//logo-->
			
			<!--ribbon-->
			<div class="ribbon">				
				<nav>
						<ul class="profile-nav">
							<?php 
								$name = explode(' ', Auth::user()->name);
								$last_name = array_pop($name);
							?>
							<li class="active"> @if(Auth::check())<a title="{{Auth::user()->name}}"> @endif Hi<br/>{{$last_name}} !!</a></li>
							<li><a href="{{url('partner/my-account',['id' => Auth::user()->id])}}"title="Settings">Quản lý </a></li>
							<li><a href="{{asset('partner/logout')}}" title="Đăng xuất">Đăng xuất</a></li>
						</ul>
				</nav>
			</div>
			<!--//ribbon-->
			
			<!--search-->
			<div class="search">
				{{-- <form id="search-form" method="get" action="search-form">
					<input type="search" placeholder="Search entire site here" name="site_search" id="site_search" /> 
					<input type="submit" id="submit-site-search" value="submit-site-search" name="submit-site-search"/>
				</form> --}}
			</div>
			<!--//search-->
			
			<!--contact-->
			<div class="contact">
				<span>24/7 Support number</span>
				<span class="number">1- 555 - 555 - 555</span>
			</div>
			<!--//contact-->
		</div>
		
		<!--main navigation-->
		<nav class="main-nav" role="navigation" id="nav">
			<ul class="wrap">
				<li><a href="{{url('partner/trangchu')}}" title="Home" class="active">Trang chủ</a></li>
				<li><a >Danh mục</a>
					<ul>
						<li><a href="{{url('partner/list-homestay')}}">Danh sách homestay</a></li>
						<li><a href="{{url('partner/list-room')}}">Danh sách phòng</a></li>
					</ul>
				</li>
				<li><a href="{{url('partner/list-bills')}}" >Hóa đơn</a>
			</ul>
		</nav>
		<!--//main navigation-->
    </header>