@extends('partner/master')
@section('main')
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
					<!-- <ul class="top-right-nav">
						<li><a href="#" title="Back to results">Quay lại</a></li>
					</ul> -->
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--full content-->
				<section class="full-width">
					<form id="booking" method="post" action="index.html" class="booking">
						<fieldset>
							<h3><span>03 </span>Đổi mật khẩu</h3>
							<div class="row twins">
								<div class="f-item">
									<label for="name">Mật khẩu</label>
									<input type="password" id="password" name="password" />
								</div>
							</div>
							<div class="row twins">
								<div class="f-item">
									<label for="name">Nhập lại mật khẩu</label>
									<input type="password" id="password" name="password" />
								</div>
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