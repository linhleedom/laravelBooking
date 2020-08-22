@extends("user.master")

@section('title')
My Account
@endsection

@section('script')
    $(document).ready(function() {
        $('#star').raty({
            score    : 3,
            click: function(score, evt) {
            	alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
        	}
        });

		$('#provinces').change(function(){
			var cid = $(this).val();
			if(cid){
				$.ajax({
					type:"get",
					url: '../get-district/'+cid,//Please see the note at the end of the post**
					success:function(res){       
						if(res.length !== 0){
							$("#districts").empty();
							$("#wards").empty();
							$("#districts").append('<option>Chon</option>');
							$.each(res,function(key,value){
								$("#districts").append('<option value="'+key+'">'+value+'</option>');
							});
						}else{
							$("#districts").empty();
							$("#wards").empty();
							$("#districts").append('<option>Chọn</option>');
							$("#wards").append('<option>Chọn</option>');
						}
					}

				});
			}
		});

		$('#districts').change(function(){
			var cid = $(this).val();
			if(cid){
				$.ajax({
					type:"get",
					url: '../get-ward/'+cid,//Please see the note at the end of the post**
					success:function(res){       
						if(res){
							$("#wards").empty();
							$("#wards").append('<option>Chon</option>');
							$.each(res,function(key,value){
								$("#wards").append('<option value="'+key+'">'+value+'</option>');
							});
						}
					}
				});
			}
		});
    });
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
						<li><a href="#" title="My Account">My Account</a></li>                                    
					</ul>
					<!--//crumbs-->
				
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth">
				
					<h1>My account</h1>
					
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li><a href="#MySettings" title="Settings">Cài đặt tài khoản</a></li>
							<li><a href="#MyBookings" title="My Booking">Phòng đang đặt</a></li>
							<li><a href="#MyHistorys" title="Bookings History">Lịch sử đặt phòng</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					
					<!--MySettings-->
					<section id="MySettings" class="tab-content">
						<article class="mysettings">
							<h1>Thông tin của bạn</h1>
							<table>
								<tr>
									<th>Họ và Tên</th>
									<td>{{$user->name}}&nbsp&nbsp
										@if(Session::get('edit_name') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@endif	
										<!--edit fields-->
										<div class="edit_field" id="field1">
											<form action="{{route('userEditName',['id' => $id])}}" method="post">
												{{ csrf_field() }}
												<label for="new_name">Nhập tên mới: </label>
												<input type="text" id="name" name="name" required="required"/>
												<input type="submit" value="Cập nhật" name="editUserName" class="gradient-button" id="editUserName"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field1" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>E-mail: </th>
									<td>{{$user->email}}&nbsp&nbsp
										@if(Session::get('edit_email') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@elseif( count($errors->email) >0)
											<i class="error_account">{{$errors->email->first('email')}}</i><br/>
										@endif
										<!--edit fields-->
										<div class="edit_field" id="field2">
											<form action="{{route('userEditEmail',['id' => $id])}}" method="post" >
												{{ csrf_field() }}
												<label for="email">Nhập địa chỉ email mới: </label>
												<input type="email" id="email" name="email" />
												<input type="submit" value="Cập nhật" name="editEmail" class="gradient-button" id="editEmail"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field2" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Mật khẩu: </th>
									<td>
										@if(Session::get('edit_pass') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@elseif( count($errors->password) >0)
											<i class="error_account">Đổi mật khẩu không thành công</i>
										@else
											••••••••••••
										@endif
										<!--edit fields-->
										<div class="edit_field" id="field3">
											<form action="{{route('userEditPassword',['id' => $id])}}" method="post">
												{{ csrf_field() }}
												<div class="input-pass">
													<label for="pass_old">Nhập mật khẩu cũ: </label>
													<input type="password" id="pass_old" class="show" name="pass_old" required="required"/>
													<input type="button" class="btnShow" value="show" id="showPassword">
													@if( $errors->has('pass_old') )
														<i class="error_account">{{$errors->first('pass_old')}}</i><br/>
													@endif
												</div>
												<div class="input-pass">
													<label for="pass_new">Nhập mật khẩu mới: </label>
													<input type="password" id="pass_new" class="show" name="pass_new" required="required"/>
													<input type="button" class="btnShow" value="show" id="showPassword">
													@if( $errors->has('pass_new') )
														<i class="error_account">{{$errors->first('pass_new')}}</i><br/>
													@endif
												</div>
												<div class="input-pass">
													<label for="confirm_pass_new">Nhập lại mật khẩu mới: </label>
													<input type="password" id="confirm_pass_new" class="show" name="confirm_pass_new" required="required"/>
													<input type="button" class="btnShow" value="show" id="showPassword">
													@if( $errors->has('confirm_pass_new') )
														<i class="error_account">{{$errors->first('confirm_pass_new')}}</i><br/>
													@endif
												</div>
												<input type="submit" value="Cập nhật" name="editPassword" class="gradient-button" id="editPassword"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field3" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Số điện thoại: </th>
									<td>{{$user->phone}}&nbsp&nbsp
										@if(Session::get('edit_phone') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@elseif( count($errors->phone) >0)
											<i class="error_account">{{$errors->phone->first('phone')}}</i><br/>
										@endif
										<!--edit fields-->
										<div class="edit_field" id="field4">
											<form action="{{route('userEditPhone',['id' => $id])}}" method="post">
												{{ csrf_field() }}
												<label for="phone">Nhập số điện thoại mới: </label>
												<input type="text" id="phone" name="phone" minLength="6" maxLength="12" required="required"/>
												<input type="submit" value="Cập nhật" name="editPhone" class="gradient-button" id="editPhone"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field4" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Ảnh đại diện: </th>
									<td>
										<img src="{{$user->avatar}}" alt="avatar" width="70" height="70">
										@if(Session::get('edit_avatar') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@elseif( count($errors->avatar) >0)
											<i class="error_account">{{$errors->avatar->first('avatar')}}</i><br/>
										@endif
										<!--edit fields-->
										<div class="edit_field" id="field5">
											<form action="{{route('userEditAvatar',['id' => $id])}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
												<label for="avatar">Chọn ảnh đại diện mới </label>
												<input type="file" id="avatar" name="avatar" /><br/>
												<input type="submit" value="Cập nhật" name="editAvatar" class="gradient-button" id="editAvatar"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field5" class="gradient-button edit">Sửa</a></td>
								</tr>
								<tr>
									<th>Địa chỉ: </th>
									@if( !empty($user->address_detail) && !empty($user->xaid) )
										<td>{{$user->address_detail.', '.$user->ward->name.', '.$user->ward->district->name.', '.$user->ward->district->province->name}}
											<br/>
											@if(Session::get('edit_address') == 'success')
												<i class="done_account">{{Session::get('massage')}}</i>
											@elseif(Session::get('edit_address') == 'fail')
												<i class="error_account">{{Session::get('massage')}}</i>
											@endif	
									@elseif(empty($user->address_detail) && !empty($user->xaid))
										<td>{{$user->ward->name.', '.$user->ward->district->name.', '.$user->ward->district->province->name}}
										<br/>
											@if(Session::get('edit_address') == 'success')
												<i class="done_account">{{Session::get('massage')}}</i>
											@elseif(Session::get('edit_address') == 'fail')
												<i class="error_account">{{Session::get('massage')}}</i>
											@endif
									@else
										<td>
										<br/>
											@if(Session::get('edit_address') == 'success')
												<i class="done_account">{{Session::get('massage')}}</i>
											@elseif(Session::get('edit_address') == 'fail')
												<i class="error_account">{{Session::get('massage')}}</i>
											@endif
									@endif	
										<!--edit fields-->
										<div class="edit_field" id="field6">
											<form action="{{route('userEditAddress',['id' => $id])}}" method="post" >
												{{ csrf_field() }}
												<label for="address_detail">Địa chỉ cụ thể(không bắt buộc):</label>
												<textarea name="address_detail" id="address_detail" cols="10" rows="3"></textarea>
												<label>Tỉnh/Thành Phố</label>
												<select name="provinces" id="provinces">
													<option selected="selected">Chọn</option>
													@if($province)
														@foreach($province as $provinceVal)
															<option value="{{$provinceVal->matp}}">{{$provinceVal->name}}</option>
														@endforeach
													@endif
												</select>
												<label>Quận/Huyện</label>
												<select name="districts" id="districts">
													<option selected="selected">Chọn</option>
												</select>
												<label>Phường/Xã</label>
												<select name="wards" id="wards">
													<option selected="selected">Chọn</option>
												</select>
												<br/>
												<input type="submit" value="Cập nhật" name="editPhone" class="gradient-button" id="editPhone"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field6" class="gradient-button edit">Sửa</a></td>
								</tr>
							</table>

						</article>
					</section>
					<!--//MySettings-->
					
					<!--MyReviews-->
					<section id="MyBookings" class="tab-content">
						<!--booking-->
						<article class="bookings">
							<h1><a href="#">Tên Homestay</a></h1>
							<div class="b-info">
								<table>
									<tr>
										<th>Loại phòng</th>
										<td>1 giường đơn</td>
									</tr>
									<tr>
										<th>Số lượng phòng</th>
										<td>1 phòng</td>
									</tr>
									<tr>
										<th>Ngày nhận phòng</th>
										<td>23-05-20</td>
									</tr>
									<tr>
										<th>Ngày trả phòng</th>
										<td>30-05-20</td>
									</tr>
									<tr>
										<th>Tổng tiền thanh toán</th>
										<td><strong>200.000đ</strong></td>
									</tr>
									<tr>
										<th>Trạng thái đặt phòng</th>
										<td><strong>Đặt phòng thành công</strong></td>
									</tr>
								</table>
							</div>
							
							<div class="actions">
								<a href="#" class="gradient-button">Change booking</a>
								<a href="#" class="gradient-button">Cancel booking</a>
								<!-- <a href="#" class="gradient-button">View confirmation</a>
								<a href="#" class="gradient-button">Print confirmation</a> -->
							</div>
						</article>
						<!--//booking-->
					</section>
					<!--//MyReviews-->
					
					<!--My Bookings-->
					<section id="MyHistorys" class="tab-content">
						@foreach($billHistory as $billHistoryVal)
							@foreach( $billHistoryVal->order->take(1) as $order )@endforeach
							<!--booking-->
							<article class="bookings">
								<h1>{{$order->product->homestay->name}}</h1>
								<div class="b-info">
									<table>
										<tr>
											<th>Số lượng phòng</th>
											<td>{{$billHistoryVal->order->count()}} phòng</td>
										</tr>
											<tr>
												<th>Ngày nhận phòng</th>
												<td>{{date( "d-m-Y", strtotime($order->date_start))}}</td>
												
											</tr>
											<tr>
												<th>Ngày trả phòng</th>
												<td>{{date( "d-m-Y", strtotime($order->date_end))}}</td>
											</tr>
										
										<tr>
											<th>Tổng tiền thanh toán</th>
											<td><strong>{{ number_format( $billHistoryVal->payments,0,',',' ' ) }}đ</strong></td>
										</tr>
										<tr>
										<th>Đánh giá</th>
										<td>
											<!--Star rating-->
											<dt>Star rating</dt>
											<dd style="display: block; height: auto;">
												<div id="star" data-rating="4" style="cursor: pointer; width: 130px;">
													<img src="user/images/ico/star-rating-on.png" alt="1" title="bad">&nbsp;
													<img src="user/images/ico/star-rating-on.png" alt="2" title="poor">&nbsp;
													<img src="user/images/ico/star-rating-on.png" alt="3" title="regular">&nbsp;
													<img src="user/images/ico/star-rating-off.png" alt="4" title="good">&nbsp;
													<img src="user/images/ico/star-rating-off.png" alt="5" title="gorgeous">
													<input type="hidden" name="score" value="3">
												</div>
											</dd>
											<!--//Star rating-->
											<textarea readonly="readonly" name="comment" id="comment" cols="10" rows="3">dfdgfdgfgf</textarea>
										</td>
									</tr>
									</table>
								</div>
								
								<div class="actions">
									<a href="#" class="gradient-button">Book again</a>
									<a href="#" class="gradient-button">Remove from list</a>
								</div>
							</article>
							<!--//booking-->
						@endforeach
					</section>
					<!--//My Bookings-->	
				</section>
				<!--//three-fourth content-->
				
				<!--sidebar-->
				<aside class="right-sidebar">

					<!--Need Help Booking?-->
					<article class="default clearfix">	
						<h2>Hỗ trợ đặt phòng?</h2>
						<p>Gọi cho nhóm dịch vụ khách hàng của chúng tôi theo số dưới đây để nói chuyện với một trong những cố vấn của chúng tôi, những người sẽ giúp bạn với tất cả các nhu cầu kỳ nghỉ của bạn.</p>
						<p class="number">1800 1989</p>
					</article>
					<!--//Need Help Booking?-->
					
					<!--Ads-->
					<article class="default clearfix">
						<img src="uploads/Ads/ad.png" alt="">
					</article>
					<!--//Ads-->
					
				</aside>
				<!--//sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection