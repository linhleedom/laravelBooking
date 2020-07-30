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
						<form id="booking" method="post" action="reset-password-partner-step3.html" class="booking">
							<fieldset>
								<h3><span>02 </span>Xác minh email</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="confirm_email">Nhập Mã xác thực lại email</label>
										<input type="text" id="confirm_email" name="confirm_email" />
									</div>
								</div>
								<div class="row">
									<div class="f-item">
										<h5>Chúng tôi đã gửi mã xác nhận đến email của bạn( Nếu không phát hiện email, hãy kiểm tra trong hộp thư <strong>spam</strong>)</h5><br/>
									</div>
								</div>
								<div class="row">
									<div class="f-item">
										<p>Nếu vẫn không nhận được email xác thực, hãy nhấp vào <strong>Gửi lại</strong> bên dưới </p>
									</div>
								</div>
								<input type="submit" class="gradient-button" value="Tiếp tục" id="next-step" />
								<button style="border: none;" type="button" onclick="load_page()" class="gradient-button">Gửi lại email xác minh</button>
							</fieldset>
						</form>
					</section>
				<!--//full content-->
			</div>
			<!--//main content-->
		</div>
	</div>
    <!--//main-->
    <script>
		// Initiate selectnav function
		selectnav();

        function load_page(){
            location.reload();
        }
	</script>
@endsection