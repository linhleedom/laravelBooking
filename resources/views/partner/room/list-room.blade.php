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
					<div class="deals clearfix">
                        <div style="text-align: center; font-size: 4.5em;margin-bottom: 50px;">Danh sách các phòng</div>
                        <table class="list-homestay">
                            <tr>
                                <th>STT</th>
                                <th>Homestay</th>
                                <th>Tên Phòng</th>
								<th>Giá Phòng</th>
								<th>Trạng thái</th>
								<th colspan="3">Trạng thái</th>
                            </tr>
                            <?php $i = 0 ;?>
                            @foreach($product as $productVal)
                            <?php $i++;  ?>  
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>{{$productVal->homestay->name}}</td>
                                    <td>{{$productVal->name}}</td>
                                    <td>{{$productVal->prices}}</td>
                                    <td>{{($productVal->status==0)?"Ẩn":"Hiện"}}</td>
                                    <td>
                                        <a href="../room-detail" title="chi tiết" class="gradient-button add">Chi tiết phòng</a>
                                        <a href="{{url('partner/edit-list-room', ['id' => $productVal->id])}}" title="Sửa" class="gradient-button edit1">Sửa</a>
                                        <a href="{{url('partner/delete-room', ['id' => $productVal->id])}}" title="Xóa" class="gradient-button delete" onclick="return confirm('Bạn muốn xóa phòng ?')">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="bottom-nav">
							<!--back up button-->
							{{-- <a href="#" class="scroll-to-top" title="Back up">Top</a>  --}}
							<!--//back up button-->
							
							<!--pager-->
								{{ $product->withQueryString()->links('vendor.pagination.custom') }}
							<!--//pager-->
						</div>
                    </div>
                    <div class="separator"></div>
                    
				</section>
				<!--//top destinations-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection