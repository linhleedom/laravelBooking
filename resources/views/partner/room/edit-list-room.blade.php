@extends('partner.master')
@section('title')
Edit Room
@endsection
@section('script')
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
						<li><a href="{{route('list-room',['id'=>$product->homestay_id])}}" title="ListRoom">Danh sách phòng</a></li> 
						<li>Sửa phòng</li>                               
					</ul> 
					<!--//crumbs-->
					
					<!--top right navigation-->
					<!-- <ul class="top-right-nav">
						<li><a href="#" title="Back to results">Back to results</a></li>
						<li><a href="#" title="Change search">Change search</a></li>
					</ul> -->
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth form-booking">
					<h1 style="text-align: center;text-transform: uppercase;">Thông tin phòng của bạn</h1>
					<form id="booking" method="post" action="" class="booking " enctype="multipart/form-data" >
						@csrf
						@if(Session::get('thongbao') == 'success')
							<i class="notify-success">{{Session::get('massage')}}</i>
						@endif
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<fieldset>
							<div colspan="2" 
									style="color: #32df5d;
										/* background-color: #f2dede; */
										border-color: #ebccd1;
										width: 500px;
										height: 50px;
										font-size: 1.5em;
								">
							</div>
							<h3><span>01 </span> Hạng mục homestay</h3>
							<div class="row twins">
								<div class="f-item custom-item">
									<label>Tên homestay</label>
									<select name="homestay_id" id="">
										<option selected="selected" >Chọn</option>
										@foreach ($homestay as $homestayVal)											
											<option required value="{{$homestayVal->id}}" @if($homestayVal->id == $product->homestay_id) selected @endif >{{$homestayVal->name}}</option>
										@endforeach										
									</select>
								</div>
								<div class="f-item custom-item">
									<label for="">Trạng thái của phòng</label>
									<label for="status1">Ẩn  &nbsp 
										<input required type="radio" id="status1" name="status"  value="0" @if($product->status ==0) checked  @endif/></label>
									<label for="status2">Hiện  &nbsp 
										<input required type="radio" id="status2" name="status"  value="1" @if($product->status ==1) checked  @endif/>
									</label>
								</div>
							</div>
							<h3 style="margin-top: 20px;"><span>02</span> Chi tiết chỗ nghỉ</h3>
							<div class="row twins">
								<div class="f-item custom-item">
									<label for="">Tên phòng :
										<input required type="text" name="name" value="{{$product->name}}" >
									</label>									
								</div>	
								<div class="f-item custom-item">
									<label for="">Diện tích phòng m<sup>2</sup></label>
								<input required type="number"  name="area"  value="{{$product->area}}" />
									</label>										
								</div>							
								<div class="f-item custom-item">
									<label for="">Kiểu phòng :</label>
									<select name="room_type" id="room_type">										
										<option selected="selected" >Chọn</option>
											@foreach($room_type as $room_typeval)
												<option value="{{$room_typeval->id}}" @if($room_typeval->id == $product->room_type_id) selected @endif >{{$room_typeval->name}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<h3 style="margin-top: 20px;"><span>02</span> Giá phòng & ưu đãi </h3>

							<div class="row twins">
								<div class="f-item custom-item">
									<label>Nhập giá phòng (VNĐ) :</label>
									<form action="/action_page.php">
									<input type="text" id="prices" name="prices" value="{{$product->prices}}" ><br><br>
									</form>
								</div>
								<div class="f-item custom-item">
									<label>Giảm giá :</label>
									<input type="text" id="discount" name="discount" value="{{$product->discount}}" placeholder="... %">
								</div>																
							</div>

							<div class="row twins">
							<h3 style="margin-top: 20px;"><span>03</span> Mô tả </h3>
								<div class="f-item custom-item">
									<label>Mô tả khác: </label>
								<textarea rows="10" cols="10" id="description" name="description" >{{$product->description}}</textarea>
								</div>
							</div>
							
							<h3 style="margin-top: 20px;"><span>04</span> Tiện ích có tại chỗ nghỉ</h3>
							<div class="row twins">
								<div class="f-item custom-item checkbox">
										@foreach ( $utilities as $utilities)		
											<input type="checkbox" name="tienich[]" id="check" value="{{$utilities->id}}" 
											<?php echo  in_array($utilities->id, $utilityIds) ?  'checked = "checked"' : null; ?>
											/>
												<label for="" >{{$utilities->name }}</label> <br> <br>
										@endforeach
									{{-- @endforeach --}}
								</div>
							</div>	

							@if(empty($product->avatar))
								<h3 style="margin-top: 20px;"><span>05</span> Ảnh </h3>

								<div class="row twins">
									<div class="f-item custom-item">
										<label for="avatar">Thay ảnh phòng :</label>
											<input   type="file" name="avatar" multiple id="avatar" value="{{$product->avatar}}">											
									</div>
								</div>
							@endif
							<br>
							<input type="submit" class="gradient-button" value="Cập nhật" id="update" >	
							</div>
						
						</fieldset>							
					</form>
				</section>
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection