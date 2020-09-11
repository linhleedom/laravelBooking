            <div class="lightbox" id="login" style="display:none;">
				<div class="lb-wrap">
					<a  class="close no-href">x</a>
					<div class="lb-content">
						<form action="{{Route('loginUser')}}" method="post">
                            {{ csrf_field() }}
							@if( Session::get('feedback') == 'register_success' )
								<h1 style="text-align:center">{{Session::get('massage')}}</h1>
							@else
								<h1>Đăng nhập</h1>
							@endif
							<div class="f-item">
								<label for="email">Địa chỉ email</label>
								<input type="email" id="emailLogin" name="email" required="required"/>
								@if( $errors->login->has('email') )
									<span class="feedback">{{$errors->login->first('email')}}</span><br/>
								@endif
							</div>
							<div class="input-pass f-item">
								<label for="password">Mật khẩu</label>
								<input type="password" id="password_login" class="show" name="password" required="required"/>
								<input type="button" class="btnShow showPassword" value="show">
								@if( $errors->login->has('password') )
									<span class="feedback">{{$errors->login->first('password')}}</span><br/>
								@endif
							</div>
							<div class="f-item checkbox">
								<input type="checkbox" id="remember_me" name="remember_me" />
								<label for="remember_me">Duy trì đăng nhập</label>
                                @if( Session::get('feedback') == 'fail' )
                                    <span class="feedback">{{Session::get('massage')}}</span>
                                @endif
							</div>
                            <input type="hidden" name="permission" value="2">
							<p>
								<a href="{{Route('userResetPassword')}}" title="Forgot password?">Quên mật khẩu?</a>
								@if( Session::get('feedback') !== 'register_success' )
									<br />
									<span style="color: rgba(56, 209, 255, 0.86);" >Nếu bạn chưa có tài khoản?</span>
									<a class="register no-href" title="Sign up">Đăng ký</a>
								@endif
							</p>
							<input type="submit" id="loginBtn" name="login-btn" value="Đăng nhập" class="gradient-button"/>
						</form>
					</div>
				</div>
			</div>
@section('scriptLogin')
	@if( Session::get('feedback') == 'fail' || count($errors->login) >0 )
        <script>
            $(document).ready(function() {
				$("#login").css("display", "block");
            });
        </script>
	@endif
@endsection