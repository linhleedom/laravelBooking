@extends('partner.master')
@section('title')
List Room
@endsection
@section('main')
    <!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
                        <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
                        <li><a href="{{route('list-homestay')}}" title="list-homestay">Danh sách Homestay</a></li> 
                        <li>Danh sách phòng </li>                                    
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->	
				
				<section class="full">
					<h1 style="text-align: center; font-size: 3em;">Danh sách phòng của Homestay</h1>
					@if(empty(Auth::user()->phone ))
						<div class="alert"><i class="alert-danger">Vui lòng cập nhật số điện thoại trước khi tạo phòng</i></div>
					@elseif(empty(Auth::user()->xaid))
						<div class="alert"><i class="alert-danger">Vui lòng cập nhật địa chỉ trước khi tạo phòng</i></div>
					@else 
					<div class="sort-by" style="width:98%">
						<ul class="sort custom" style="float: right">
							<li>Thêm phòng
								<a href="{{route('addRoom',['id' =>$homestay_id])}}" title="addRoom" class="add"></a>
							</li>
						</ul>
					</div>  
					<div class="deals clearfix">
						<!--deal-->
                        @foreach($product as $productVal)
						<article class="one-fourth">
							<figure><a href="{{url('room-detail'.'?id='.$productVal->homestay->id)}}" title=""><img src="{{asset('public/'.$productVal->avatar)}}" alt="" width="270" height="152" /></a></figure>
							<div class="details">
								<h1>{{$productVal->homestay->name}}</h1>
								<span class="address"> Tên • <a title="tên phòng"  style="color:red ;font-size :12px" >{{$productVal->name}}</a></span>
								<span class="address">	Loại • <a title="loại phòng"  style="color:red ;font-size :12px" >{{$productVal->roomType->name}}</a></span>
								<span class="address status_room_custom" >Trạng thái  •  
									@if ($productVal->status == 1)                                    
										<a title="Sửa"  style="color:#32df5d ;font-size :12px" >Hiện</a>
									@elseif($productVal->status == 0)                                 
										<a href="" title="Sửa" style="color:red ;font-size :12px" >Ẩn</a>
									@endif
								</span>
								@if($productVal->discount != 0)
								<span class="rating like" style="margin-bottom : 10px">&nbsp;
										{{$productVal->discount}}%
								</span>
								@elseif($productVal->discount == 0)
								<span class="rating nosale" style="margin-bottom : 10px">&nbsp;
									No Sales
								</span>
								@endif
								<span class="price none-border">Thêm ảnh &nbsp; &nbsp;
									<em>                                
										<a href="{{route('UploadImageRoom',['id'=>$productVal->id])}}"><img src="partner/images/ico/plus.png" alt="" width="22" height="22" /></a>
									</em>
								</span>
								<span class="price none-border" style="border-top : none;">Giá phòng  <em>{{number_format( $productVal->prices,0,',','.' ) }}đ</em> </span>
								<span class="price"  style="border: none;margin : 0 auto"><label for="">Chỉnh sửa &nbsp; &nbsp;</label> 
									<em>                                
										<a href="{{url('partner/edit-list-room', ['id' => $productVal->id])}}"><img src="partner/images/ico/edit.png" alt="" width="16" height="16" /></a>
									</em>
								</span>
								<a href="{{url('partner/delete-room', ['id' => $productVal->id])}}" title="Xóa" class="gradient-button delete" onclick="return confirm('Bạn muốn xóa phòng ?')">Xóa phòng</a>
							</div>
						</article>
						@endforeach
						<div class="bottom-nav">							
							<!--pager-->
								{{ $product->withQueryString()->links('vendor.pagination.custom') }}
							<!--//pager-->
						</div>
					
					@endif
						<!--//deal-->
					</div>
			<!--//deals-->
                    <div class="separator"></div>
                    
				</section>
				<!--//top destinations-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection
@section('script1')
	$('#search').on('keyup',function(){
		$value = $(this).val();
		$.ajax({
			type: 'get',
			url: '{{ URL::to('search') }}',
			data: {
				'search': $value
			},
			success:function(data){
				$('tbody').html(data);
			}
		});
	})
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
@endsection