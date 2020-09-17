<footer>
	<div class="wrap clearfix">
		<!--column-->
		<article class="one-fourth">
			<h3>Book Your Travel</h3>
			<p>238 Hoàng Quốc Việt, Bắc Từ Liêm, Hà Nội</p>
			<p><em>Phone:</em> 24/7 liên hệ: 1800 1989</p>
			<p><em>Email:</em> <a href="mailto:bookyourtravel@gmail.com" title="bookyourtravel@gmail.com">bookyourtravel@gmail.com</a></p>
		</article>
		<!--//column-->
		
		<!--column-->
		<article class="one-fourth">
			<h3>Hỗ trợ khách hàng</h3>
			<ul>
				<li><a href="{{route('userConditions')}}" title="Điều khoản và điều kiện">Điều khoản và điều kiện</a></li>
				<li><a href="javascript:" title="Làm cách nào để đặt chỗ?">Làm cách nào để đặt chỗ?</a></li>
				<!-- <li><a href="javascript:" title="Payment options">Payment options</a></li> -->
				<li><a href="javascript:" title="Mẹo đặt phòng">Mẹo đặt phòng</a></li>
			</ul>
		</article>
		<!--//column-->
		
		<!--column-->
		<article class="one-fourth">
			<h3>Theo dõi chúng tôi</h3>
			<ul class="social">
				<li class="facebook"><a href="javascript:" title="facebook">facebook</a></li>
				<li class="youtube"><a href="javascript:" title="youtube">youtube</a></li>
				<!-- <li class="rss"><a href="javascript:" title="rss">rss</a></li> -->
				<!-- <li class="linkedin"><a href="javascript:" title="linkedin">linkedin</a></li> -->
				<li class="googleplus"><a href="javascript:" title="googleplus">googleplus</a></li>
				<li class="twitter"><a href="javascript:" title="twitter">twitter</a></li>
				<!-- <li class="vimeo"><a href="javascript:" title="vimeo">vimeo</a></li> -->
				<li class="pinterest"><a href="javascript:" title="pinterest">pinterest</a></li>
			</ul>
		</article>
		<!--//column-->
		
		<!--column-->
		<article class="one-fourth">
			<h3>Đăng ký tài khoản</h3>
			<!-- <form id="newsletter" action="newsletter.php" method="post"> -->
				<fieldset>
					<input type="email" id="email_signup" name="email_signup" placeholder="Nhập email của bạn tại đây" />
					<input type="submit" id="signUp"  name="signUp" value="Đăng ký" onclick="singUp()" class="gradient-button" />
				</fieldset>
			<!-- </form> -->
		</article>
		<!--//column-->
		
		<section class="bottom">
			<p class="copy">Copyright © 2020 Book Your Travel</p>
			<nav>
				<ul>
					<li><a href="javascript:" title="About us">Giới thiệu</a></li>
					<li><a href="contact.html" title="Contact">Liên hệ</a></li>
					<li><a href="javascript:" title="Partners">Đối tác</a></li>
					<!-- <li><a href="javascript:" title="Customer service">Customer service</a></li> -->
					<li><a href="javascript:" title="FAQ">FAQ</a></li>
					<!-- <li><a href="javascript:" title="Careers">Careers</a></li> -->
					<li><a href="{{route('userConditions')}}" title="Terms & Conditions">Điều khoản và điều kiện</a></li>
					<!-- <li><a href="javascript:" title="Privacy statement">Privacy statement</a></li> -->
				</ul>
			</nav>
		</section>
	</div>
</footer>
<script>
	// Initiate selectnav function
	selectnav();
	function singUp(){
		var email = $('#email_signup').val();
		$("#register").css("display", "block");
		$('#emailRegister').val(email);
	}

</script>