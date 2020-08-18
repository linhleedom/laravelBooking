@extends("user.master")

@section('title')
Search Result
@endsection

@section('script')
$(document).ready(function() {
	$('dt').each(function() {
		var tis = $(this), state = false, answer = tis.next('dd').hide().css('height','auto').slideUp();
		tis.click(function() {
			state = !state;
			answer.slideToggle(state);
			tis.toggleClass('active',state);
		});
	});
	
	$('.view-type li:first-child').addClass('active');

	$("#address").autocomplete({
		source: "{{route('userAutoComplete')}}",
		open: function(event, ui){
			$("#address").autocomplete ("widget").css("width","249px");  
		} 
	});

});

	$(window).load(function () {
	var maxHeight = 0;
			
	$(".three-fourth .one-fourth").each(function(){
	if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});
	$(".three-fourth .one-fourth").height(maxHeight);	
	});	
@endsection

@section('home')
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
						@if( $district !== "" )
							<li><a href="{{route('userSearch').'?address='.$province.$url}}" title="{{$province}}">{{$province}}</a></li>
							<li><a title="$district">{{$district}}</a></li>
						@else
						<li><a title="{{$province}}">{{$province}}</a></li>
						@endif
						<li>Search results</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->
			
				<!--sidebar-->
				<aside class="left-sidebar">
					<article class="search-left">
						<form action="{{route('userSearch')}}">
							<div class="row-1">
								<div class="f-item">
									<label for="address">Địa điểm</label>
									<input type="text" placeholder="" value="{{$address}}" id="address" name="address" required="required"/>
								</div>
							</div>
							<div class="row-2">
								<div class="f-item datepicker">
									<label for="datepicker1">Nhận phòng</label>
									<div class="datepicker-wrap"><input type="text" placeholder="" value="{{$datepicker1}}" id="datepicker1" name="datepicker1" /></div>
								</div>
								<div class="f-item datepicker">
									<label for="datepicker2">Trả Phòng</label>
									<div class="datepicker-wrap"><input type="text" placeholder="" value="{{$datepicker2}}" id="datepicker2" name="datepicker2" /></div>
								</div>
							</div>
							<div class="row-3">
								<div class="f-item spinner">
									<label for="num_room">Số phòng</label>
									<input type="text" placeholder="" value="{{$num_room}}" id="num_room" name="num_room" required="required"/>
								</div>
								<div class="f-item spinner">
									<label for="num_adult">Người lớn</label>
									<input type="text" placeholder="" value="{{$num_adult}}" id="num_adult" name="num_adult" required="required"/>
								</div>
								<div class="f-item spinner">
									<label for="num_chil">Trẻ em</label>
									<input type="text" placeholder="" value="{{$num_chil}}" id="num_chil" name="num_chil" required="required"/>
								</div>
							</div>
							<input type="submit" value="Tìm kiếm" class="search-submit" id="search-submit" />
						</form>
					</article>
					@if( isset($datepicker1) && isset($datepicker2) )
						<article class="refine-search-results">
							<h2>Tìm kiếm theo</h2>
							<dl>
								<!--Price-->
								<dt>Giá(1phòng/1đêm)</dt>
								<dd>
									<div class="checkbox">
										<input type="checkbox" id="ch1" name="price" />
										<label for="ch1">Dưới 300 000đ</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="ch2" name="price" />
										<label for="ch2">300 000đ - 600 000đ</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="ch4" name="price" />
										<label for="ch5">Trên 600.000</label>
									</div>
								</dd>
								<!--//Price-->
							
								<!--Room type-->
								<dt>Loại Phòng</dt>
								<dd>
									@foreach($room_type as $room_type_Val)
									<div class="checkbox">
										<input type="checkbox" id="ch6" name="accommodation" />
										<label for="ch6">{{$room_type_Val->name}}</label>
									</div>
									@endforeach
								</dd>
								<!--//Room type-->

								<!--Tiện ích-->
								<dt>Tiện ích</dt>
								<dd>
									@foreach($utilities as $utilitiesVal)
										<div class="checkbox">
											<input type="checkbox" id="ch6" name="accommodation" />
											<label for="ch6">{{$utilitiesVal->name}}</label>
										</div>
									@endforeach
								</dd>
								<!--//Tiện ích-->	
							
								<!--xếp hạng thao địa điểm-->
								<dt>Xếp hạng theo điểm</dt>
								<dd>
									<div class="checkbox">
										<input type="checkbox" id="ch15" name="facilities" />
										<label for="ch15">1 sao</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="ch16" name="facilities" />
										<label for="ch16">2 sao</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="ch17" name="facilities" />
										<label for="ch17">3 sao</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="ch18" name="facilities" />
										<label for="ch18">4 sao</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="ch19" name="facilities" />
										<label for="ch19">5 sao</label>
									</div>
								</dd>
								<!--//xếp hạng thao địa điểm-->
							</dl>
						</article>
					@else	
						<article class="refine-search-results">
							<h6><i>Chọn ngày để lọc kết quả</i></h6>
						</article>
					@endif
				</aside>
				<!--//sidebar-->
			
				<!--three-fourth content-->
				<section class="three-fourth">
					<div class="sort-by">
						<h3>Sắp xếp theo</h3>
						
						<ul class="sort">
						@if( isset($datepicker1) && isset($datepicker2) )
							<li>Giá
								<a title="ascending" id="price-max" class="ascending no-href">ascending</a>
								<a title="descending" id="price-min" class="descending no-href">descending</a>
							</li>
							<li>Đánh giá 
								<a title="ascending" class="ascending no-href">ascending</a>
								<a title="descending" class="descending no-href">descending</a>
							</li>
						@else
							<li>Đánh giá 
								<a title="ascending" class="ascending no-href">ascending</a>
								<a title="descending" class="descending no-href">descending</a>
							</li>
						@endif
						</ul>
						<ul class="view-type">
							<li class="grid-view"><a class="no-href" title="grid view">grid view</a></li>
							<li class="list-view"><a class="no-href" title="list view">list view</a></li>
							<!-- <li class="location-view"><a href="#" title="location view">location view</a></li> -->
						</ul>
					</div>
					<div class="deals clearfix">
						@foreach( $product as $productVal )
							<!--deal-->
							@if($productVal->discount == 0)
								<article class="one-fourth">
							@else
								<article class="one-fourth" id="promo">
								<div class="ribbon-small">- {{$productVal->discount}}%</div>
							@endif
								<figure><a href="{{route('userRoomDetail').'?id='.$productVal->homestay->id.$url}}" title=""><img src="{{$productVal->avatar}}" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>{{$productVal->homestay->name}}
										<div class="stars">
											<span class="point">{{$productVal->homestay->point}}</span>
										</div>
									</h1>
									<span class="address"><a href="{{route('userSearch').'?address='.$productVal->homestay->province->name.$url}}">{{$productVal->homestay->province->name}}</a></span>
									<span class="address"><a href="{{route('userSearch').'?address='.$productVal->homestay->district->name.' - '.$productVal->homestay->province->name.$url}}">{{$productVal->homestay->district->name}}</a></span>
									@if( isset($datepicker1) && isset($datepicker2) )
										<span class="address product_name">{{$productVal->roomType->name}}</span>
										<span class="address">Phù hợp cho {{$productVal->roomType->capacity}} người</span>
										<!-- <span class="rating">200</span> -->
										<span class="price">
											Giá 1 đêm  
											<em>{{ number_format( $productVal->prices,0,',','.' ) }}đ</em> 
										</span>
									@else
										<span class="price">
											Giá 1 đêm chỉ từ  
											<em>{{ number_format( $productVal->homestay->product->min('prices'),0,',','.' ) }}đ</em> 
										</span>
									@endif	
										<div class="description">
											<p>{{$productVal->homestay->title}}</p>
										</div>
									<a href="{{route('userRoomDetail').'?id='.$productVal->homestay->id.$url}}" title="Book now" class="gradient-button">Chọn phòng</a>
								</div>
							</article>
							<!--//deal-->
						@endforeach	
						<!--bottom navigation-->
						<div class="bottom-nav">
							<!--back up button-->
							<a href="#" class="scroll-to-top" title="Back up">Top</a> 
							<!--//back up button-->
							
							<!--pager-->
								{{ $product->withQueryString()->links('vendor.pagination.custom') }}
							<!--//pager-->
						</div>
						<!--//bottom navigation-->
					</div>
				</section>
				<!--//three-fourth content-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection