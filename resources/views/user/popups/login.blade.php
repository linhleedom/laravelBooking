            <div class="lightbox" id="login" style="display:none;">
				<div class="lb-wrap">
					<a  class="close no-href">x</a>
					<div class="lb-content">
						<form action="{{Route('loginUser')}}" method="post">
                            {{ csrf_field() }}
							<h1>Đăng nhập</h1>
							<div class="f-item">
								<label for="email">Địa chỉ email</label>
								<input type="email" id="email" name="email" required="required"/>
							</div>
							<div class="f-item">
								<label for="password">Mật khẩu</label>
								<input type="password" id="password" name="password" minLength="8" maxLength="20" required="required"/>
							</div>
							<div class="f-item checkbox">
								<input type="checkbox" id="remember_me" name="remember_me" />
								<label for="remember_me">Duy trì đăng nhập</label>
								@foreach($errors->all() as $message)
									<span class="feedback">{{$message}}</span>
								@endforeach
                                @if( Session::get('feedback') == 'fail' )
                                    <span class="feedback">{{Session::get('massage')}}</span>
                                @endif
							</div>
                            <input type="hidden" name="permission" value="2">
							<p><a href="user_reset_password_step_1.html" title="Forgot password?">Quên mật khẩu?</a>
								<br />
								<span style="color: rgba(56, 209, 255, 0.86);" >Nếu bạn chưa có tài khoản?</span>
								<a class="register no-href" title="Sign up">Đăng ký</a></p>
							<input type="submit" id="loginBtn" name="login-btn" value="Đăng nhập" class="gradient-button"/>
						</form>
					</div>
				</div>
			</div>
@section('scriptEnd')
    @if( Session::get('feedback') == 'fail' || empty($errors) )
        <script>
            $(document).ready(function() {
				$("#login").css("display", "block");
            });
        </script>
	@endif
@endsection