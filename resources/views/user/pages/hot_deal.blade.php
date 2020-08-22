@extends("user.master")

@section('title')
Hot Deals
@endsection

@section('hot_deal')
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
						<li><a href="#" title="Home">Home</a></li> 
						<li>Hot deals</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->
				
				<!--top destinations-->			
				
				<section class="full">
					@foreach($matp as $matpVal)
						<h1 class="address-hot-deal"><a href="{{route('userSearch').'?address='.$matpVal->province->name.$urlSearch}}">{{$matpVal->province->name}}</a></h1>
						<div class="deals clearfix">
							@foreach( $matpVal->province->homestay->where('status','1')->take(4) as $homestayVal )
							<!--deal-->
							<article class="one-fourth promo">
								<div class="ribbon-small">- {{$homestayVal->product->max('discount')}}%</div>
								<figure>
									<a href="{{route('userRoomDetail').'?id='.$homestayVal->id.$urlSearch}}" title="">
										<img src="{{$homestayVal->avatar}}" alt="" width="270" height="152" />
									</a>
								</figure>
									<div class="details">
										<h1>{{$homestayVal->name}}&nbsp&nbsp
											<span class="stars">
												<span class="point">{{$homestayVal->point}}</span>
											</span>
										</h1>
										<span class="address"><a href="{{route('userSearch').'?address='.$homestayVal->province->name.$urlSearch}}">{{$homestayVal->province->name}}</a></span>
										<span class="address"><a href="{{route('userSearch').'?address='.$homestayVal->district->name.' - '.$homestayVal->province->name.$urlSearch}}">{{$homestayVal->district->name}}</a></span>
										<!-- <span class="rating">200</span> -->
										<span class="price">
											Giá 1 đêm chỉ từ  
											<em>{{ number_format( $homestayVal->product->min('prices'),0,',','.' ) }}đ</em> 
										</span>
										<div class="description">
											<p>{{$homestayVal->title}}</p>
										</div>
										<a href="{{route('userRoomDetail').'?id='.$homestayVal->id.$urlSearch}}" title="Book now" class="gradient-button">Chọn phòng</a>
									</div>
							</article>
							<!--//deal-->
							@endforeach
						</div>
						<div class="separator"></div>
					@endforeach
					<!--bottom navigation-->
				
					<!--back up button-->
					<a href="#" class="scroll-to-top" title="Back up">Top</a> 
					<!--//back up button-->
				<!--//bottom navigation-->
				</section>
				<!--//top destinations-->
				
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection