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
						<form id="booking" method="post" action="{{route('userResetPasswordPost')}}" class="booking">
							{{ csrf_field() }}
							<fieldset>
								<h3><span>01 </span>Nhập email của bạn</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="name">Địa chỉ email</label>
										<input type="email" id="email" name="email" />
										@if(Session::get('checkUser') == 'fail')
											<i class="error_account">{{Session::get('massage')}}</i>
										@endif
									</div>
								</div>
								<input type="submit" class="gradient-button" value="Tiếp theo" id="next-step" />
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