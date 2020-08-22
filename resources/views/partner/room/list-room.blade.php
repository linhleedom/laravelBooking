@extends('partner.master')
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
                        <li><a href="#" title="Home">Home</a></li>   
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
                                <th>Loại Phòng</th>
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
                                    <td>{{$productVal->roomType->name}}</td>
                                    <td>{{$productVal->prices}}</td>
                                    <td>{{($productVal->status==0)?"Ẩn":"Hiện"}}</td>
                                    <td>
                                        <a href="../room-detail" title="chi tiết" class="gradient-button add">Chi tiết phòng</a>
                                        <a href="{{url('partner/edit-list-room', ['id' => $productVal->id])}}" title="Sửa" class="gradient-button edit1">Sửa</a>
                                        <a href="" title="Xóa" class="gradient-button delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
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