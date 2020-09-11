@extends('partner.master')
@section('title')
Add Room
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
                        <li><a href="{{url('partner/trangchu')}}" title="Home">Home</a></li> 
						<li><a href="{{url('partner/list-room')}}" title="ListHomestay">Danh sách phòng</a></li> 
						<li>Thêm Homestay</li>                               
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
								<div colspan="2" 
									style="color: #32df5d;
										/* background-color: #f2dede; */
										border-color: #ebccd1;
										width: 500px;
										height: 20px;
										font-size: 1.5em;
								">
								</div>
							<fieldset>

								<h3><span>01 </span> Hạng mục homestay</h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label>Tên homestay</label>
										<select name="homestay_id" id="">
											<option disabled selected value >Chọn</option>
												@foreach($homestay as $homestayVal)
													<option required value="{{$homestayVal->id}}">{{$homestayVal->name}}</option>
												@endforeach
										</select>
										@if( $errors->addHomestay->has('homestay_id') )
											<span class="notify"><i>{{$errors->addHomestay->first('homestay_id')}}</i></span><br/>
										@endif
									</div>
									<div class="f-item custom-item">
										<label for="">Trạng thái của phòng</label>
										<label for="status1">Ẩn  &nbsp 
											<input required type="radio" id="status1" name="status"  value="0" /></label>
										<label for="status2">Hiện  &nbsp 
											<input required type="radio" id="status2" name="status"  value="1" checked/>
										</label>
									</div>
								</div>
								<h3 style="margin-top: 20px;"><span>02</span> Chi tiết chỗ nghỉ</h3>
								<div class="row twins">
									<div class="f-item custom-item">
										<label for="">Tên phòng :
											<input  type="text" name="name" >
										</label>
										@if( $errors->addHomestay->has('name') )
											<span class="notify"><i>{{$errors->addHomestay->first('name')}}</i></span><br/>
										@endif										
									</div>
									<div class="f-item custom-item">
										<label for="area1">Diện tích phòng m<sup>2</sup> 	
											<input  type="number" name="area"/>
										</label>
										@if( $errors->addHomestay->has('area') )
											<span class="notify"><i>{{$errors->addHomestay->first('area')}}</i></span><br/>
										@endif										
									</div>
								</div>
								<div class="row twins">
									<div class="f-item custom-item">
										<label for="">Kiểu phòng :</label>
										<select name="room_type_id" id="">
											<option disabled selected value >Chọn</option>
												@foreach($types as $typeval)
													<option value="{{$typeval->id}}">{{$typeval->name}}</option>
												@endforeach
										</select>
										@if( $errors->addHomestay->has('room_type_id') )
											<span class="notify"><i>{{$errors->addHomestay->first('room_type_id')}}</i></span><br/>
										@endif
									</div>
								</div>
								<h3 style="margin-top: 20px;"><span>02</span> Giá phòng & ưu đãi </h3>

								<div class="row twins">
									<div class="f-item custom-item">
										<label>Nhập giá phòng (VNĐ) :</label>
										<form action="/action_page.php">
											<input  type="text" id="prices" name="prices" ><br><br>
										</form>
										@if( $errors->addHomestay->has('prices') )
											<span class="notify"><i>{{$errors->addHomestay->first('prices')}}</i></span><br/>
										@endif
									</div>
									<div class="f-item custom-item">
										<label>Giảm giá :</label>
										<input  type="text" id="discount" name="discount" placeholder="... %">
										@if( $errors->addHomestay->has('discount') )
											<span class="notify"><i>{{$errors->addHomestay->first('discount')}}</i></span><br/>
										@endif
									</div>																
								</div>

								<div class="row twins">
								<h3 style="margin-top: 20px;"><span>03</span> Mô tả </h3>
									<div class="f-item custom-item">
										<label>Mô tả khác: </label>
										<textarea rows="10" cols="10" id="description" name="description" ></textarea>
										@if( $errors->addHomestay->has('description') )
											<span class="notify"><i>{{$errors->addHomestay->first('description')}}</i></span><br/>
										@endif
									</div>
									<div class="f-item custom-item">
										<label for="avatar">Avatar room of Homestay :</label>
											<input type="file" name="avatar" multiple id="avatar">
											@if( $errors->addHomestay->has('avatar') )
												<span class="notify"><i>{{$errors->addHomestay->first('avatar')}}</i></span><br/>
											@endif
									</div>
								</div>
								
								<h3 style="margin-top: 20px;"><span>04</span> Tiện ích có tại chỗ nghỉ</h3>
								<div class="row twins">
									<div class="f-item custom-item checkbox">
										@foreach ($tienichs as $items)											
											<input type="checkbox" name="tienich[]" id="{{$items->id}}" value="{{$items->id}}"/>
											<label for="{{$items->id}}" >{{ $items->name }}</label> <br> <br>
										@endforeach
									</div>
									@if( $errors->addHomestay->has('tienich') )
										<span class="notify"><i>{{$errors->addHomestay->first('tienich')}}</i></span><br/>
									@endif
								</div>
							
								<input type="submit" class="gradient-button" value="Thêm mới" id="update" >	
							</fieldset>							
						</form>
					</section>
				<!--//three-fourth content-->
				
				<!--right sidebar-->
				<aside class="right-sidebar">
					<!--Booking details-->
					<!-- <article class="booking-details clearfix">
						<h1>Best ipsum hotel 
							<span class="stars">
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
							</span>
						</h1>
						<span class="address">Marylebone, London</span>
						<span class="rating"> 8 /10</span>
						<div class="booking-info">
							<h6>Rooms</h6>
							<p>Standard twin room</p>
							<h6>Room Description</h6>
							<p>Room only</p>
							<h6>Check-in Date</h6>
							<p>14-11-12</p>
							<h6>Check-out Date</h6>
							<p>15-11-12</p>
							<h6>Room(s)</h6>
							<p>1 night, 1 room, max. 2 people. </p>
						</div>
						<div class="price">
							<p class="total">Total Price:  $ 55,00</p>
							<p>VAT (20%) included</p>
						</div>
					</article> -->
					<!--//Booking details-->
					
					<!--Need Help Booking?-->
					<!-- <article class="default clearfix">
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">1- 555 - 555 - 555</p>
					</article> -->
					<!--//Need Help Booking?-->
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection