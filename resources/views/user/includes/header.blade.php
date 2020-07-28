<header>
		<div class="wrap clearfix">
			<!--logo-->
			<h1 class="logo"><a href="../" title="Book Your Travel - home"><img src="user/images/txt/logo.png" alt="Book Your Travel" /></a></h1>
			<!--//logo-->
			
			<!--ribbon-->
			<div class="ribbon">
				<nav>
					<ul class="profile-nav">
						<li class="active"><a class="no-href" title="My Account">Tài khoản</a></li>
						<li><a  class="register no-href" title="Register">Đăng ký</a></li>
						<li><a  class="login no-href" title="Login">Đăng nhập</a></li>
					</ul>
					<ul class="currency-nav">
						<li class="active"><a href="#" title="Partners">Đối tác</a></li>
					</ul>
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
				<span class="number">1800 1989</span>
			</div>
			<!--//contact-->
		</div>
		
		<!--main navigation-->
		<nav class="main-nav" role="navigation" id="nav">
			<ul class="wrap">
				<li @yield('home') ><a href="../" title="Home">Trang chủ</a></li>
				<li @yield('blog') ><a href="../blog"  title="Blog">Blog</a></li>
				<li @yield('hot_deal') ><a href="../hot-deal" title="Hot deals">Khuyến mại</a></li>
			</ul>
		</nav>
		<!--//main navigation-->

		<!-- Popup -->
		<div class="popup">
			<!-- Login -->
			<div class="lightbox" id="login" style="display:none;">
				<div class="lb-wrap">
					<a  class="close no-href">x</a>
					<div class="lb-content">
						<form>
							<h1>Đăng nhập</h1>
							<div class="f-item">
								<label for="email">Địa chỉ email</label>
								<input type="email" id="email" name="email" />
							</div>
							<div class="f-item">
								<label for="password">Mật khẩu</label>
								<input type="password" id="password" name="password" />
							</div>
							<div class="f-item checkbox">
								<input type="checkbox" id="remember_me" name="checkbox" />
								<label for="remember_me">Duy trì đăng nhập</label>
							</div>
							<p><a href="user_reset_password_step_1.html" title="Forgot password?">Quên mật khẩu?</a>
								<br />
								<span style="color: rgba(56, 209, 255, 0.86);" >Nếu bạn chưa có tài khoản?</span>
								<a class="register no-href" title="Sign up">Đăng ký</a></p>
							<input type="submit" id="login" name="login" value="Đăng nhập" class="gradient-button"/>
						</form>
					</div>
				</div>
			</div>

			<!-- Register -->
			<div class="lightbox" id="register" style="display:none;">
				<div class="lb-wrap">
					<a class="close no-href">x</a>
					<div class="lb-content">
						<form>
							<h1>Đăng ký</h1>
							<div class="f-item">
								<label for="f_name">Họ và Tên</label>
								<input type="text" id="f_name" name="f_name" />
							</div>
							<div class="f-item">
								<label for="email">Địa chỉ email</label>
								<input type="email" id="email" name="email" />
							</div>
							<div class="f-item">
								<label for="password">Mật khẩu</label>
								<input type="password" id="password" name="password" />
							</div>
							<div class="f-item">
								<label for="confirm_password">Nhập lại mật khẩu</label>
								<input type="password" id="confirm_password" name="confirm_password" />
							</div>
							<div class="f-item checkbox">
								<input type="checkbox" id="newsletter" name="newsletter" />
								<label for="newsletter">Thông báo cho tôi những ưu đãi độc quyền</label>
							</div>
							<p style="color: rgba(56, 209, 255, 0.86);">Hãy nhấn <span style="color: aliceblue;">"Đăng ký"</span> nếu bạn đã đọc và đông ý với <a href="user_terms_of_service.html">Điều khoản dịch vụ</a> và <a href="user_terms_of_service.html">Chính sách bảo mật</a> của chúng tôi. </p>
							<input type="submit" id="register" name="register" value="Đăng ký" class="gradient-button"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- //Popup -->
	</header>