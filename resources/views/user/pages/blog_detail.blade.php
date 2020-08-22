@extends("user.master")

@section('title')
Blog Detail
@endsection

@section('script')
@endsection

@section('blog')
class="active"
@endsection

@section('content')
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="{{route('userHomePage')}}" title="Home">Home</a></li>
						<li><a href="{{route('userBlog')}}" title="Blog">Blog</a></li> 
						<li>{{$blogDetailVal->title}}</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
					<section class="three-fourth">
						<div class="post-header">
							<div class="post-title">
								<h1>{{$blogDetailVal->title}}</h1>
							</div>
							<div class="post-infor">
								<p class="post-date">{{date( "d-m-Y", strtotime( $blogDetailVal->created_at ))}}</p>
							</div>
						</div>
						<div class="post-content">
							{!! $blogDetailVal->post !!}
						</div>
					</section>
				<!--//three-fourth content-->
				
				<!--right sidebar-->
				<aside class="right-sidebar">
					<!--Homestay suggest-->
					<article class="default clearfix">
						<h2>Gợi ý cho bạn</h2>
						@foreach($homestaySuggest as $homestaySuggestVal)
							<div class="deal-of-the-day">
								<a href="{{route('userRoomDetail').'?id='.$homestaySuggestVal->id.$urlSearch}}">
									<figure><img src="{{$homestaySuggestVal->avatar}}" alt="" width="230" height="130" /></figure>
									<h3>{{$homestaySuggestVal->name}} &nbsp&nbsp
										<span class="stars">
											<span class="point">{{$homestaySuggestVal->point}}</span>
										</span>
									</h3>
									<span id="address">{{$homestaySuggestVal->province->name}}</span>
									<p>Từ <span class="price">{{ number_format( $homestaySuggestVal->product->min('prices'),0,',','.' ) }}<small>/đêm</small></span></p>	
								</a>
							</div>
						@endforeach
						<br /><br />
						<a href="{{route('userSearch').'?address='.$homestaySuggestVal->province->name.$urlSearch}}" title="Show all" class="show-all">Show all</a>
					</article>
					<!--//Homestay suggest-->

					<!--Ads-->
					<!-- <article class="default clearfix">
						<img src="uploads/Ads/ad.png" alt="">
					</article> -->
					<!--//Ads-->

					<!--Need Help Booking?-->
					<article class="default clearfix">	
						<h2>Hỗ trợ đặt phòng?</h2>
						<p>Gọi cho nhóm dịch vụ khách hàng của chúng tôi theo số dưới đây để nói chuyện với một trong những cố vấn của chúng tôi, những người sẽ giúp bạn với tất cả các nhu cầu kỳ nghỉ của bạn.</p>
						<p class="number">1800 1989</p>
					</article>
					<!--//Need Help Booking?-->
				</aside>
				<!--//right sidebar-->

                <!--bottom navigation-->
                <div class="bottom-nav">
                    <!--back up button-->
                    <a href="#" class="scroll-to-top" title="Back up">Back up</a> 
                    <!--//back up button-->
                </div>
                <!--//bottom navigation-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection