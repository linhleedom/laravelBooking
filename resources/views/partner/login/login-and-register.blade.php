@extends('partner/master')
@section('main')
    <!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--three-fourth content-->
				<section class="three-fourth" style="padding: 70px;">
					
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li><a href="#Login" title="Login">Login Account</a></li>
							<li><a href="#Register" title="Register">Register Account</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					
					<!--Login account-->
					<section id="Login" class="tab-content login-tab">
						<!--booking-->
						<article class="logins">
							
							<div class="b-info">
								<h1 style="text-align: center;"><a href="#">Login </a></h1>
								<form role="form" method="POST">
									<table style="margin :0 auto;">
										@include('errors.note')
										<tr>
											<th>E-mail address</th>
											<td>
											<input type="email" id="email" name="email" value="{{old('email')}}" />
											</td>
										</tr>
										<tr>
											<th>Password</th>
											<td>
												<input type="password" id="password" name="password" />
											</td>
										</tr>
										<tr>
											<td></td>
											<td >
												<label for="">Lưu mật khẩu
													<input type="checkbox" name="remember" value="Remember Me">
												</label>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												Bạn quên mật khẩu ?<a href="" title="Forgot password?"> <br> Reset mật khẩu nhé !</a>
											</td>
										</tr>	
										<!-- <tr>
											<td colspan="2">
												Bạn chưa có tài khoản ?<a href="#Register" title="Register"> Đăng ký tài khoản tại đây !</a>
											</td>
										</tr>								 -->
										<tr style="text-align: center;">
											<td colspan="2">
												<input type="submit" id="login" name="login" class="gradient-button" value="Đăng nhập" />
											</td>
										</tr>
									</table>
									{{csrf_field()}}
								</form>
							</div>
						</article>
						<!--//booking-->
						
					</section>
					<!--//Login account-->
					
					
					<!--MyReviews-->
					<section id="Register" class="tab-content register-tab">
						<article class="logins">
							<h1 style="text-align: center;"><a >Register </a></h1>
							<div class="b-info">
								<form action="" method="POST">
									<table>
										<tr>
											<th>Email</th>
											<td>
												<input type="email" name="email" id="email">
											</td>
										</tr>
										<tr>
											<th>Name</th>
											<td>
												<input type="text" name="name" id="name">
											</td>
										</tr>
										<tr>
											<th>Phone</th>
											<td>
												<input type="text" name="phone" id="phone">
											</td>
										</tr>
										<tr>
											<th>PassWord</th>
											<td>
												<input type="password" name="password" id="password">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>
												<input type="submit" name="login" value="Create Account " class="gradient-button">
											</td>
										</tr>
									</table>
								</form>
							</div>
						</article>
					</section>
					<!--//MyReviews-->					
				</section>
				<!--//three-fourth content-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection