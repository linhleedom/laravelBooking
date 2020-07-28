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
						<h1>Chọn mục</h1>
						<form id="booking" method="post" action="pays-new-step1.html" class="booking">
							<fieldset style="text-align: center;">
								<input type="submit" class="gradient-button" value="Thanh toán cho người mới" id="next-step" />
							</fieldset>
						</form>
						<form id="booking" method="post" action="pays-booking.html" class="booking">
							<fieldset style="text-align: center;">
								<input type="submit" class="gradient-button" value="Thanh toán bình thường" id="next-step" />
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