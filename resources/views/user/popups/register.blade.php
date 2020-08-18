            <div class="lightbox" id="register" style="display:none;">
				<div class="lb-wrap">
					<a class="close no-href">x</a>
					<div class="lb-content">
						<form action="{{Route('registerUser')}}" method="post">
							{{ csrf_field() }}
							<h1>Đăng ký</h1>
							<div class="f-item">
								<label for="name">Họ và Tên</label>
								<input type="text" id="name" name="name" required="required"/>
							</div>
							<div class="f-item">
								<label for="email">Địa chỉ email</label>
								<input type="email" id="email" name="email" minLength="8" maxLength="20" required="required"/>
							</div>
							<div class="f-item">
								<label for="phone">Số điện thoại</label>
								<input type="text" id="phone" name="phone" minLength="6" maxLength="12" required="required"/>
							</div>
							<div class="f-item">
								<label for="password">Mật khẩu</label>
								<input type="password" id="password" name="password" required="required"/>
							</div>
							<div class="f-item">
								<label for="confirm_password">Nhập lại mật khẩu</label>
								<input type="password" id="confirm_password" name="confirm_password" required="required"/>
							</div>
							<div class="f-item checkbox">
								<input type="checkbox" id="newsletter" name="newsletter" />
								<label for="newsletter">Thông báo cho tôi những ưu đãi độc quyền</label>
							</div>
							<p style="color: rgba(56, 209, 255, 0.86);">Hãy nhấn <span style="color: aliceblue;">"Đăng ký"</span> nếu bạn đã đọc và đông ý với <a href="user_terms_of_service.html">Điều khoản dịch vụ</a> và <a href="user_terms_of_service.html">Chính sách bảo mật</a> của chúng tôi. </p>
							<input type="submit" id="register" name="register" value="Đăng ký" class="gradient-button"/>
						</form>
					</div>
				</div>
			</div>