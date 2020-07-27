@extends("user.master")

@section('title')
Blog
@endsection

@section('script')
	$(document).ready(function(){
		$(".form").hide();
		$(".form:first").show();
		$(".f-item:first").addClass("active");
		$(".f-item:first span").addClass("checked");
	});
@endsection

@section('blog')
class="active"
@endsection

@section('content')
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!-- main content -->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="#" title="Home">Home</a></li> 
						<li>Blog</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--deals-->
				<section class="full">
					<h1>Địa điểm du lịch</h1>
					<div class="deals clearfix">
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						<!--deal-->
						<article class="one-fourth">
							<figure><a href="../blog-detail" title=""><img src="user/images/uploads/img.jpg" alt="" width="270" height="172" /></a></figure>
							<div class="details">
								<a href="#" class="title">Du lịch Phú Quốc : Khinh nghiệm du lịch phú quốc tự túc</a>
								<div class="description blog">
									<p>Phú Quốc địa danh được rất nhiều người quan tâm mà mong muốn một lần được ghé qua. Vậy thì còn chần chừ gì nữa, hôm nay Blog Trần Phú sẽ cùng bạn tìm hiểu Du lịch phú quốc có gì hấp dẫn và những kinh nghiệm đến phú quốc bạn cần có. <a href="../blog-detail">More info</a></p>
									<p class="time_created">15 tháng 5, 2020</p>
								</div>
							</div>
						</article>
						<!--//deal-->
						
						<!--bottom navigation-->
						<div class="bottom-nav">
							<!--back up button-->
							<a href="#" class="scroll-to-top" title="Back up">Back up</a> 
							<!--//back up button-->
							
							<!--pager-->
							<div class="pager">
								<span><a href="#">Trang đầu</a></span>
								<span><a href="#">&lt;</a></span>
								<span class="current">1</span>
								<span><a href="#">2</a></span>
								<span><a href="#">3</a></span>
								<span><a href="#">4</a></span>
								<span><a href="#">5</a></span>
								<span><a href="#">6</a></span>
								<span><a href="#">7</a></span>
								<span><a href="#">8</a></span>
								<span><a href="#">&gt;</a></span>
								<span><a href="#">Trang cuối</a></span>
							</div>
							<!--//pager-->
						</div>
						<!--//bottom navigation-->
					</div>
				</section>	
				<!--//deals-->
			</div>
			<!-- //main content -->
		</div>
	</div>
	<!--//main-->
@endsection