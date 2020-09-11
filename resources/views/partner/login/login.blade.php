@extends('partner.login.master-login')
@section('content')
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
						</ul>
					</nav>
					<!--//inner navigation-->
					
					<!--Login account-->
					<section id="Login" class="tab-content login-tab">
						<!--booking-->
						<article class="logins">														
							@if( Session::get('errors-register') == 'register_success' )
								<span class="success-register" style="text-align:center">{{Session::get('massage')}}</span>
							@endif
							@if( $errors->login->has('email') )
								<span class="errors-register"><i>{{$errors->login->first('email')}}</i></span><br/>
							@endif
							@if( $errors->login->has('password') )
								<span class="errors-register"><i>{{$errors->login->first('password')}}</i></span><br/>
							@endif
							@if( Session::get('errors-register') == 'fail' )
                                    <span class="errors-register">{{Session::get('massage')}}</span>
                            @endif
							<div class="b-info">
								<h1 style="text-align: center;">Login</h1>
								<form action="" method="POST" >
									@csrf
									<table style="margin :0 auto;">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<tr>
											<th>E-mail address</th>
											<td>
											<input required type="email" id="email" name="email" />
											</td>
										</tr>
										<tr>
											<th>Password</th>
											<td>
												<input required type="password" id="password" name="password" />
											</td>
										</tr>
										<tr>
											<td> <input type="hidden" name="permission" value="1"></td>
											<td>
												<label for="remember" style="margin-left: -135px;">Nhớ mật khẩu
													 <input type="checkbox" name="remember"  id="remember" value="Remember Me">
												</label>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<a href="{{route('userResetPassword')}}" title="Forgot password?" style= "text-decoration: none">Quên mật khẩu ?</a>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td colspan="2">
												<input type="submit" id="login" name="login" class="gradient-button" value="Đăng nhập" />
											</td>
										</tr>
									</table>
								</form>
							</div>
						</article>
						<!--//booking-->
						
					</section>
					<!--//Login account-->					
				</section>
				<!--//three-fourth content-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->