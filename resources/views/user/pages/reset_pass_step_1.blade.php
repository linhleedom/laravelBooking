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
						<li><a href="#" title="Home">Home</a></li>
						<li><a href="#" title="Hotels">Reset Password</a></li>                                  
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<ul class="top-right-nav">
						<li><a href="#" title="Back to results">Quay lại</a></li>
					</ul>
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--full content-->
					<section class="full-width">
						<form id="booking" method="post" action="user_reset_password_step_2.html" class="booking">
							<fieldset>
								<h3><span>01 </span>Nhập email của bạn</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="name">Địa chỉ email</label>
										<input type="text" id="email" name="email" />
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