            <div class="lightbox" id="register" style="display:none;">
				<div class="lb-wrap">
					<a class="close no-href">x</a>
					<div class="lb-content">
						<form action="{{Route('registerUser')}}" method="post">
							{{ csrf_field() }}
							<h1>Đăng ký</h1>
							<div class="f-item">
								<label for="name">Họ và Tên</label>
								<input type="text" id="nameRegister" name="name" required="required"/>
							</div>
							<div class="f-item">
								<label for="email">Địa chỉ email</label>
								<input type="email" id="emailRegister" name="email" required="required"/>
								@if( $errors->register->has('email') )
									<span class="feedback">{{$errors->register->first('email')}}</span><br/>
								@endif
							</div>
							<div class="f-item">
								<label for="phone">Số điện thoại</label>
								<input type="text" id="phoneRegister" name="phone" minLength="6" maxLength="12" required="required"/>
								@if( $errors->register->has('phone') )
									<span class="feedback">{{$errors->register->first('phone')}}</span><br/>
								@endif
							</div>
							<div class="input-pass f-item">
								<label for="password">Mật khẩu</label>
								<input type="password" id="password" class="show" name="password" minLength="8" maxLength="12" required="required"/>
								<input type="button" class="btnShow showPassword" value="show">
								@if( $errors->register->has('password') )
									<span class="feedback">{{$errors->register->first('password')}}</span><br/>
								@endif
							</div>
							<div class="input-pass f-item">
								<label for="confirm_password">Nhập lại mật khẩu</label>
								<input type="password" id="confirm_password" class="show" name="confirm_password" required="required"/>
								<input type="button" class="btnShow" value="show" id="showPassword">
								@if( $errors->register->has('confirm_password') )
									<span class="feedback">{{$errors->register->first('confirm_password')}}</span><br/>
								@endif
							</div>
							<!-- <div class="f-item checkbox">
								<input type="checkbox" id="newsletter" name="newsletter" />
								<label for="newsletter">Thông báo cho tôi những ưu đãi độc quyền</label>
							</div> -->
							<p style="color: rgba(56, 209, 255, 0.86);">Hãy nhấn <span style="color: aliceblue;">"Đăng ký"</span> nếu bạn đã đọc và đông ý với <a href="user_terms_of_service.html">Điều khoản dịch vụ</a> và <a href="user_terms_of_service.html">Chính sách bảo mật</a> của chúng tôi. </p>
							<input type="submit" id="register" name="register" value="Đăng ký" class="gradient-button"/>
						</form>
					</div>
				</div>
			</div>

@section('scriptRegister')
	@if( count($errors->register) >0 )		
        <script>
            $(document).ready(function() {
				$("#register").css("display", "block");
            });
        </script>
	@elseif( Session::get('feedback') == 'register_success' )
		<script>
            $(document).ready(function() {
				$("#login").css("display", "block");
            });
        </script>
	@endif
@endsection