@extends("user.master")

@section('title')
Cancel Bill
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
						<li>Cancel Bill</li>
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--full content-->
					<section class="full-width">
						<form id="booking" method="post" action="user_reset_password_step_3.html" class="booking">
							<fieldset>
								<h3><span>02 </span>Hủy phòng thành công</h3>
								<div class="row">
									<div class="f-item">
										<h5>Chúng tôi đã thực hiện hủy đặt phòng, vui lòng quay lại trang chủ</h5><br/>
									</div>
								</div>
								<br /><br />
								<a href="{{route('userHomePage')}}" class="gradient-button">Trang chủ</a>
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