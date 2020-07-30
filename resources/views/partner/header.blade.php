<header>
		<div class="wrap clearfix">
			<!--logo-->
			<h1 class="logo"><a href="#" title="Book Your Travel - home"><img src="partner/images/txt/logo.png" alt="Book Your Travel" /></a></h1>
			<!--//logo-->
			
			<!--ribbon-->
			<div class="ribbon">
				<nav>
					<ul class="profile-nav">
						{{-- <li class="active"><a title="My Account">{{Auth::user()->name}}</a></li> --}}
						<li><a href="{{asset('logout')}}" title="Logout">Logout</a></li>
						<li><a title="Settings">Settings</a></li>
					</ul>
					{{-- <ul class="lang-nav">
						<li class="active"><a href="#" title="English (US)">English (US)</a></li>
						<li><a href="#" title="English (UK)">English (UK)</a></li>
						<li><a href="#" title="Deutsch">Deutsch</a></li>
						<li><a href="#" title="Italiano">Italiano</a></li>
						<li><a href="#" title="Русский">Русский</a></li>
					</ul>
					<ul class="currency-nav">
						<li class="active"><a href="#" title="$US Dollar">$US Dollar</a></li>
						<li><a href="#" title="€ Euro">€ Euro</a></li>
						<li><a href="#" title="£ Pound">£ Pound</a></li>
					</ul> --}}
				</nav>
			</div>
			<!--//ribbon-->
			
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
				<span>24/7 Support number</span>
				<span class="number">1- 555 - 555 - 555</span>
			</div>
			<!--//contact-->
		</div>
		
		<!--main navigation-->
		<nav class="main-nav" role="navigation" id="nav">
			<ul class="wrap">
				<li><a href="index.html" title="Home">Trang chủ</a></li>
				<!-- <li><a href="hotels.html" title="Hotels">Hotels</a>
					<ul>
						<li><a href="#">Secondary navigation</a></li>
						<li><a href="#">example links</a></li>
						<li><a href="error.html">Error page</a></li>
						<li><a href="loading.html">Loading page</a></li>
					</ul>
				</li> -->
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
		</nav>
		<!--//main navigation-->
    </header>