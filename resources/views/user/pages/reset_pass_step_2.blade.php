@extends("user.master")

@section('title')
Reset Password
@endsection
@section('content')
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="{{route('userHomePage')}}" title="Home">Home</a></li>
						<li>Reset Password</li>
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--full content-->
					<section class="full-width">
						<form id="booking" method="post" action="user_reset_password_step_3.html" class="booking">
							<fieldset>
								<h3><span>02 </span>Xác minh email</h3>
								<div class="row">
									<div class="f-item">
										<h5>Chúng tôi đã gửi mã xác nhận đến email của bạn( Nếu không phát hiện email, hãy kiểm tra trong hộp thư <strong>spam</strong>)</h5><br/>
									</div>
								</div>
								<!-- <div class="row">
									<div class="f-item">
										<p>Nếu vẫn không nhận được email xác thực, hãy nhấp vào <strong>Gửi lại</strong> bên dưới </p>
									</div>
								</div>
								<input type="submit" class="gradient-button" value="Gửi lại email xác minh" id="next-step" /> -->
							</fieldset>
						</form>
					</section>
				<!--//full content-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection