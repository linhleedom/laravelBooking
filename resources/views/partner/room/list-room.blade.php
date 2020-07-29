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
								<th>Đánh giá</th>
								<th>Trạng thái</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Luxury Homestay Demo</td>
                                <td>
									Luxury
								</td>
                                <td>500000</td>
								<td>Ẩn</td>
                                <td>
									<a href="../room-detail" title="chi tiết" class="gradient-button add">Chi tiết phòng</a>
									<a href="../edit-list-room" title="Sửa" class="gradient-button edit1">Sửa</a>
                                    <a href="" title="Xóa" class="gradient-button delete">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Luxury Homestay Demo</td>
                                <td>
									Luxury
								</td>
                                <td>500000</td>
								<td>Hiện</td>
                                <td>
									<a href="room.html" title="chi tiết" class="gradient-button add">Chi tiết phòng</a>
                                    <a href="edit-list-room.html" title="Sửa" class="gradient-button edit1">Sửa </a>
                                    <a href="" title="Xóa" class="gradient-button delete">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Luxury Homestay Demo</td>
                                <td>
									Luxury
								</td>
                                <td>500000</td>
								<td>Ẩn</td>
                                <td>
									<a href="room.html" title="chi tiết" class="gradient-button add">Chi tiết phòng</a>
                                    <a href="edit-list-room.html" title="Sửa" class="gradient-button edit1">Sửa </a>
                                    <a href="" title="Xóa" class="gradient-button delete">Xóa</a>
                                </td>
                            </tr>
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