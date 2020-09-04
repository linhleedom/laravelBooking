@extends('partner.master')
@section('script')
		function checked(){
			if($('#check').prop('checked')){
				$('#next-step').prop('disabled', false);
			}else{
				$('#next-step').prop('disabled', true);
			}
		}
		
@endsection
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
						<li><a title="Home">Home</a></li>
						<li><a title="Pays Home">Pays Home</a></li> 
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
								<h3><span>01 </span>Thông tin thanh toán</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="first_name">Họ và tên</label>
										<input type="text" id="name" name="name" value="{{Auth::user()->name}}"/>
									</div>
									<div class="f-item">
										<label for="last_name">Tên Homestay</label>
										<span style="color: #dc3545;font-size:20px">{{$homestay->name}}</span>
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="email">Địa chỉ email</label>
										<input type="email" id="email" name="email" value="{{Auth::user()->email}}"/>
									</div>
									<div class="f-item">
										<label for="phone">Số điện thoại</label>
										<input type="text" id="telephone" name="telephone" value="{{Auth::user()->phone}}"/>
									</div>
								</div>
								<div class="row">
									<div class="f-item">
										<label>Yêu cầu đặc biệt: <span>(không bắt buộc)</span></label>
										<textarea rows="10" cols="10" name="note" id="note"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="f-item checkbox" onclick="checked()">
										<input type="checkbox" name="check" id="check" value="ch1" />
										<label>Có, tôi đã đọc và chấp nhận các điều khoản trong <a href="user_terms_of_service.html">booking conditions.</label>
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