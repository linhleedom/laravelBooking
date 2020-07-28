@extends('partner.master')
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
						<li><a href="#" title="Hotels">Pays Home</a></li> 
						<li>Thông tin của bạn</li>                            
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<!-- <ul class="top-right-nav">
						<li><a href="#" title="Back to results">Quay lại</a></li>
					</ul> -->
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth form-booking">
						<form id="booking" method="post" action="pays-new-step2.html" class="booking">
							<fieldset>
								<h3><span>01 </span>Thông tin của bạn</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="first_name">Họ và tên</label>
										<input type="text" id="first_name" name="first_name" />
									</div>
									<div class="f-item">
										<label for="last_name">Tên Homestay</label>
										<input type="text" id="last_name" name="last_name" />
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="email">Email address</label>
										<input type="email" id="email" name="email" />
									</div>
									<div class="f-item">
										<label for="phone">Số điện thoại</label>
										<input type="text" id="telephone" name="telephone" />
									</div>
									<!-- <span class="info">You’ll receive a confirmation email</span> -->
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="address">Địa chỉ liên hệ</label>
										<input type="text" id="address" name="address" />
									</div>
									<div class="f-item">
										<label for="city">Tỉnh</label>
										<input type="text" id="city" name="city" />
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="zip">Quận/Huyện</label>
										<input type="text" id="zip" name="zip" />
									</div>
								</div>
								<div class="row">
									<div class="f-item checkbox">
										<input type="checkbox" name="check" id="check" value="ch1" />
										<label>Yes, I have read and I agree to the <a href="#">booking conditions</a>.</label>
									</div>
								</div>
								<input type="submit" class="gradient-button" value="Xác minh thông tin" id="next-step" />
							</fieldset>
						</form>
					</section>
				<!--//three-fourth content-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection