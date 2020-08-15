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
		source: "{{url('/autoComplete')}}",
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
						<li><a href="{{url('/')}}" title="Home">Home</a></li>
						@if( $provinceSearch !== "" )
						<li><a href="{{url('/search?address=').$provinceSearch.$url}}" title="Home">{{$provinceSearch}}</a></li>
						@endif
						<li><a title="{{$address}}">{{$address}}</a></li>
						<li>Search results</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->
			
				<!--sidebar-->
				<aside class="left-sidebar">
					<article class="search-left">
						<form action="{{url('/search')}}">
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
									<input type="text" placeholder="" value="{{$num_room}}" id="num_room" name="num_room" />
								</div>
								<div class="f-item spinner">
									<label for="num_adult">Người lớn</label>
									<input type="text" placeholder="" value="{{$num_adult}}" id="num_adult" name="num_adult" />
								</div>
								<div class="f-item spinner">
									<label for="num_chil">Trẻ em</label>
									<input type="text" placeholder="" value="{{$num_chil}}" id="num_chil" name="num_chil" />
								</div>
							</div>
							<input type="submit" value="Tìm kiếm" class="search-submit" id="search-submit" />
						</form>
					</article>
						
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
							<!--//Tiện ích-->

							<!--Room type-->
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
							
							<!--chính sách đặt phòng-->
							<dt>Chính sách đặt phòng</dt>
							<dd>
								<div class="checkbox">
									<input type="checkbox" id="ch29" name="room-facilities" />
									<label for="ch29">Miễn phí hủy phòng</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch30" name="room-facilities" />
									<label for="ch30">Không cần thanh toán trước</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch31" name="room-facilities" />
									<label for="ch31">Đặt phòng không cần thẻ tín dụng</label>
								</div>
							</dd>
							<!--//chính sách đặt phòng-->
						</dl>
					</article>
				</aside>
				<!--//sidebar-->
			
				<!--three-fourth content-->
				<section class="three-fourth">
					<div class="sort-by">
						<h3>Bộ lọc</h3>
						<ul class="sort">
							<li>Giá
								<a title="ascending" class="ascending no-href">ascending</a>
								<a title="descending" class="descending no-href">descending</a>
							</li>
							<li>Đánh giá 
								<a title="ascending" class="ascending no-href">ascending</a>
								<a title="descending" class="descending no-href">descending</a>
							</li>
						</ul>
						<ul class="view-type">
							<li class="grid-view"><a class="no-href" title="grid view">grid view</a></li>
							<li class="list-view"><a class="no-href" title="list view">list view</a></li>
							<!-- <li class="location-view"><a href="#" title="location view">location view</a></li> -->
						</ul>
					</div>
					<div class="deals clearfix">
						@if( $product == "" )
							@foreach( $homestay as $homestayVal )
								<!--deal-->
								@if($homestayVal->product->max('discount') == 0)
									<article class="one-fourth">
								@else
									<article class="one-fourth promo">
									<div class="ribbon-small">- {{$homestayVal->product->max('discount')}}%</div>
								@endif
									<figure><a href="{{url('/room-detail?id='.$homestayVal->id.$url)}}" title=""><img src="{{$homestayVal->avatar}}" alt="" width="270" height="152" /></a></figure>
									<div class="details">
										<h1>{{$homestayVal->name}}
											<div class="stars">
												<span class="point">{{$homestayVal->point}}</span>
											</div>
										</h1>
										<span class="address">{{$homestayVal->province->name}}</span>
										<span class="address">{{$homestayVal->district->name}}</span>
										<!-- <span class="rating">200</span> -->
										<span class="price">Giá 1 đêm chỉ từ  
											<em>{{ number_format( $homestayVal->product->min('prices'),0,',','.' ) }}đ</em> 
										</span>
										<div class="description">
											<p>{{$homestayVal->title}}</p>
										</div>
										<a href="{{url('/room-detail?'.$url)}}" title="Book now" class="gradient-button">Chọn phòng</a>
									</div>
								</article>
								<!--//deal-->
							@endforeach	
						@else
							@foreach( $product as $productVal )
								<!--deal-->
								@if($productVal->discount == 0)
									<article class="one-fourth">
								@else
									<article class="one-fourth promo">
									<div class="ribbon-small">- {{$productVal->discount}}%</div>
								@endif
									<figure><a href="{{url('/room-detail?id='.$productVal->homestay->id.$url)}}" title=""><img src="{{$productVal->avatar}}" alt="" width="270" height="152" /></a></figure>
									<div class="details">
										<h1>{{$productVal->homestay->name}}
											<div class="stars">
												<span class="point">{{$productVal->homestay->point}}</span>
											</div>
										</h1>
										<span class="address">{{$productVal->homestay->province->name}}</span>
										<span class="address">{{$productVal->homestay->district->name}}</span>
										<span class="address product_name">{{$productVal->roomType->name}}</span>
										<span class="address">Phù hợp cho {{$productVal->roomType->capacity}} người</span>
										<!-- <span class="rating">200</span> -->
										<span class="price">
											Giá 1 đêm  
											<em>{{ number_format( $productVal->prices,0,',',' ' ) }}đ</em> 
										</span>
										<div class="description">
											<p>{{$productVal->homestay->title}}</p>
										</div>
										<a href="{{url('/room-detail?'.$url)}}" title="Book now" class="gradient-button">Chọn phòng</a>
									</div>
								</article>
								<!--//deal-->
							@endforeach	
						@endif
						<!--bottom navigation-->
						<div class="bottom-nav">
							<!--back up button-->
							<a href="#" class="scroll-to-top" title="Back up">Back up</a> 
							<!--//back up button-->
							
							<!--pager-->
							<div class="pager">
								<span><a href="#">First page</a></span>
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
								<span><a href="#">Last page</a></span>
							</div>
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