<header>
		<div class="wrap clearfix">
			<!--logo-->
			<h1 class="logo"><a href="#" title="Book Your Travel - home"><img src="partner/images/txt/logo.png" alt="Book Your Travel" /></a></h1>
			<!--//logo-->
			
			{{-- <div class="ribbon">				
				<nav>
						<ul class="profile-nav">
						<li class="active"><a>Xin cháo</a></li>
						<li><a href="{{asset('logout')}}" title="Logout">Logout</a></li>
						<li><a href="partner/login/login-and-register"title="Settings">Settings</a></li>
						</ul>
				</nav>
			</div> --}}
			
			<!--search-->
			<div class="search">
				<form id="search-form" method="get" action="search-form">
					<input type="search" placeholder="Search entire site here" name="site_search" id="site_search" /> 
					<input type="submit" id="submit-site-search" value="submit-site-search" name="submit-site-search"/>
				</form>
			</div>
			<!--//search-->
			
			<!--contact-->
			<div class="contact">
				<span ><a href="{{asset('login-partner')}}" style= "text-decoration: none ;color: ivory">Đăng nhập</a></span>
			<span ><a href="{{asset('register-partner')}}" style= "text-decoration: none ;color: ivory">Đăng ký</a></span>
			</div>
			<!--//contact-->
		</div>
		
		<!--main navigation-->
		{{-- <nav class="main-nav" role="navigation" id="nav">
			<ul class="wrap">
				<li><a href="index.html" title="Home">Trang chủ</a></li>
				<li><a href="">Danh mục</a>
					<ul>
						<li><a href="">Thêm</a></li>
						<li><a href="">Danh sách homestay</a></li>
						<li><a href="">Danh sách phòng</a></li>
					</ul>
				</li>
				<li><a href="#" title="homstay">Chỗ Nghỉ</a></li>
				<li><a href="#" title="homstay">Đánh giá</a></li>
			</ul>
		</nav> --}}
		<!--//main navigation-->
    </header>