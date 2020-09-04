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
@section('scriptEnd')
	<script>
		$("input:checkbox").change(function() {
			var address = $('.address').val();
			var datepicker1 = $('.datepicker1').val();
			var datepicker2 = $('.datepicker2').val();
			var num_room = $('.num_room').val();
			var num_adult = $('.num_adult').val();
			var num_chil = $('.num_chil').val();
			var amount = [];
			$('input:checkbox:checked').each(function() {
				amount.push($(this).val());
			});
			$.ajax({
				url: '../search-filter',
				type: 'GET',
				data: { amount: amount, address: address, datepicker1: datepicker1, datepicker2: datepicker2, num_room: num_room, num_adult: num_adult, num_chil: num_chil}
			}).done(function(response){
				$('#result_ajax').empty();
				$('#result_ajax').html(response);
				$('.one-fourth:nth-child(3n)').addClass('last');
			});
		});
		$('#price-asc').click(function(){
			var orderBy = 'asc';
			var address = $('.address').val();
			var datepicker1 = $('.datepicker1').val();
			var datepicker2 = $('.datepicker2').val();
			var num_room = $('.num_room').val();
			var num_adult = $('.num_adult').val();
			var num_chil = $('.num_chil').val();
			$.ajax({
				url: '../search-orderBy',
				type: 'GET',
				data: { orderBy: orderBy, address: address, datepicker1: datepicker1, datepicker2: datepicker2, num_room: num_room, num_adult: num_adult, num_chil: num_chil}
			}).done(function(response){
				$('#result_ajax').empty();
				$('#result_ajax').html(response);
				$('.one-fourth:nth-child(3n)').addClass('last');
			});
		})
		$('#price-desc').click(function(){
			var orderBy = 'desc';
			var address = $('.address').val();
			var datepicker1 = $('.datepicker1').val();
			var datepicker2 = $('.datepicker2').val();
			var num_room = $('.num_room').val();
			var num_adult = $('.num_adult').val();
			var num_chil = $('.num_chil').val();
			$.ajax({
				url: '../search-orderBy',
				type: 'GET',
				data: { orderBy: orderBy, address: address, datepicker1: datepicker1, datepicker2: datepicker2, num_room: num_room, num_adult: num_adult, num_chil: num_chil}
			}).done(function(response){
				$('#result_ajax').empty();
				$('#result_ajax').html(response);
				$('.one-fourth:nth-child(3n)').addClass('last');
			});
		})
		
	</script>
@endsection
@section('home')
class="active"
@endsection

@section('content')
	<!--main-->
	<div class="main" role="main">		
		<input type="hidden" class="address" value="{{ $address }}">
		<input type="hidden" class="datepicker1" value="{{ $datepicker1 }}">
		<input type="hidden" class="datepicker2" value="{{ $datepicker2 }}">
		<input type="hidden" class="num_room" value="{{ $num_room }}">
		<input type="hidden" class="num_adult" value="{{ $num_adult }}">
		<input type="hidden" class="num_chil" value="{{ $num_chil }}">
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
								<dt>Giá</dt>
								<dd>
									<form action="{{route('userSearchFilter')}}">
										<div class="checkbox">
											<input type="checkbox" class="ch1" id="ch1" name="ch1"  value="300"/>
											<label for="ch1">Dưới 300.000đ</label>
										</div>
										<div class="checkbox">
											<input type="checkbox" class="ch1" id="ch2" name="ch2" value="300-600"/>
											<label for="ch2">300.000đ - 600.000đ</label>
										</div>
										<div class="checkbox">
											<input type="checkbox" class="ch1" id="ch3" name="ch3" value="600"/>
											<label for="ch3">Trên 600.000</label>
										</div>
									</form>
								</dd>
								<!--//Price-->
							</dl>
						</article>
					@else	
						<article class="refine-search-results">
							<h6><i>Chọn ngày để lọc kết quả theo giá</i></h6>
						</article>
					@endif
				</aside>
				<!--//sidebar-->
			
				<!--three-fourth content-->
				<section class="three-fourth">
					<div class="sort-by">
						@if( isset($datepicker1) && isset($datepicker2) )
							<h3>Sắp xếp theo</h3>
							<ul class="sort">
								<li>Giá
									<a title="Giá tăng dần" id="price-asc" class="ascending no-href">ascending</a>
									<a title="Giá giảm dần" id="price-desc" class="descending no-href">descending</a>
								</li>
							</ul>
						@endif
						<ul class="view-type">
							<li class="grid-view"><a class="no-href" title="grid view">grid view</a></li>
							<li class="list-view"><a class="no-href" title="list view">list view</a></li>
							<!-- <li class="location-view"><a href="#" title="location view">location view</a></li> -->
						</ul>
					</div>
					<div class="deals clearfix">
						<div id="result_ajax">
							@include('user.ajax.search_result')
						</div>
						<!--bottom navigation-->
						<div class="bottom-nav">
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