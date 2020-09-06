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
                        <li><a href="{{url('partner/trangchu')}}" title="Home">Home</a></li>  
                        <li>Danh sách phòng </li>                                    
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->		
				
				<section class="full">
					<h1 style="text-align: center; font-size: 4.5em;margin-bottom: 50px;">Danh sách phòng của Homestay</h1>
					<div class="deals clearfix">
						<!--deal-->
                        @foreach($product as $productVal)
						<article class="one-fourth">
							<figure><a href="{{url('room-detail'.'?id='.$productVal->homestay->id)}}" title=""><img src="{{asset('public/'.$productVal->avatar)}}" alt="" width="270" height="152" /></a></figure>
							<div class="details">
								<h1>{{$productVal->homestay->name}}
									<span>
									</span>
								</h1>
								<span class="address"> {{$productVal->name}}</span>
								<span class="address">Trạng thái  •  
									@if ($productVal->status == 1)                                    
										<a title="Sửa"  style="color:#32df5d ;font-size :12px" >Hiện</a>
									@elseif($productVal->status == 0)                                 
									<a href="" title="Sửa" style="color:red ;font-size :12px" >Ẩn</a>
									@endif </a>
								</span>
								<span class="rating like">{{$productVal->homestay->point}} / 5</span>
								<span class="price">Giá phòng  <em>{{number_format( $productVal->prices,0,',','.' ) }}đ</em> </span>
								<div class="description" style="height: 110px;">
									<p><br>{{$productVal->description}}</a></p>
								</div> 
								<span class="price none-border">  
									<em>
										<a href="{{url('partner/edit-list-room', ['id' => $productVal->id])}}" title="Chỉnh sửa" class="gradient-button success">Chỉnh sửa</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{url('partner/delete-room', ['id' => $productVal->id])}}" title="Xóa" class="gradient-button delete" onclick="return confirm('Bạn muốn xóa phòng ?')">Xóa phòng</a>
									</em> 
								</span>
							</div>
						</article>
						@endforeach
						<div class="bottom-nav">							
							<!--pager-->
								{{ $product->withQueryString()->links('vendor.pagination.custom') }}
							<!--//pager-->
						</div>
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