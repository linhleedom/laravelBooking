@extends("user.master")

@section('title')
Blog
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
			<!-- main content -->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="{{route('userHomePage')}}" title="Home">Home</a></li> 
						<li>Blog</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--deals-->
				<section class="full">
					<h1>Địa điểm du lịch</h1>
					<div class="deals clearfix">
						@foreach($blog as $blogVal)
							<!--deal-->
							<article class="one-fourth">
								<figure><a href="{{route('userBlogDetail').'?id='.$blogVal->id.'&title='.$blogVal->alias}}" title=""><img src="{{$blogVal->photo}}" alt="" width="270" height="172" /></a></figure>
								<div class="details">
									<a href="{{route('userBlogDetail').'?id='.$blogVal->id.'&title='.$blogVal->alias}}" class="title">{{$blogVal->title}}</a>
									<div class="description blog">
										<p>{{$blogVal->description}}...</p>
										<p class="time_created">{{date( "d-m-Y", strtotime( $blogVal->created_at ))}}</p>
									</div>
								</div>
							</article>
							<!--//deal-->
						@endforeach
						<!--bottom navigation-->
						<div class="bottom-nav">
							<!--back up button-->
							<a href="#" class="scroll-to-top" title="Back up">Back up</a> 
							<!--//back up button-->
							
							<!--pager-->
							{{ $blog->withQueryString()->links('vendor.pagination.custom') }}
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