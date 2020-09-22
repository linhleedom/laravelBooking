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
					<form id="booking" method="post" action="{{route('userResetPasswordStep2Post')}}" class="booking">
						{{ csrf_field() }}
						<input type="text" name="token" value="{{$token}}" hidden="">
						<fieldset>
							<h3><span>03 </span>Đổi mật khẩu</h3>
							<div class="row twins">
								<div class="input-pass f-item">
									<label for="name">Mật khẩu</label>
									<input type="password" id="pass_new" class="show" name="pass_new" required="required"/>
									<!-- <input type="button" class="btnShow showPassword" value="show"> -->
								</div>
							</div>
							<div class="row twins">
								<div class="f-item">
									<label for="name">Nhập lại mật khẩu</label>
									<input type="password" id="confirm_pass_new" class="show" name="confirm_pass_new" required="required"/>
									<!-- <input type="button" class="btnShow showPassword" value="show"> -->
								</div>
								@if(Session::get('resetPass') == 'fail')
									<i class="error_account">{{Session::get('massage')}}</i>
								@endif
							</div>
							<input type="submit" class="gradient-button" value="Đổi mật khẩu" id="next-step" />
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