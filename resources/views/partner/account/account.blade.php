@extends("partner.master")

@section('title')
My Account
@endsection

@section('script')
    $(document).ready(function() {
        $('#star').raty({
            score    : 5
        });

		$('#provinces').change(function(){
			var cid = $(this).val();
			if(cid){
				$.ajax({
					type:"get",
					url: '../partner/getdistricts/'+cid,//Please see the note at the end of the post**
					success:function(res){       
						if(res.length !== 0){
							$("#districts").empty();
							$("#wards").empty();
							$("#districts").append('<option></option>');
							$.each(res,function(key,value){
								$("#districts").append('<option value="'+key+'">'+value+'</option>');
							});
						}else{
							$("#districts").empty();
							$("#wards").empty();
							$("#districts").append('<option></option>');
							$("#wards").append('<option></option>');
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
					url: '../partner/getwards/'+cid,//Please see the note at the end of the post**
					success:function(res){       
						if(res){
							$("#wards").empty();
							$("#wards").append('<option></option>');
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
						<li>My Account</li>                                    
					</ul>
					<!--//crumbs-->
				
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth">		
					
					<span class="alert-account">
						@if(Session::get('change-status') == 'success')
							<i class="change_status">{{Session::get('massage')}}</i>
						@endif
					</span>
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li><a href="#MySettings" title="Settings">Cài đặt tài khoản</a></li>
							{{-- <li><a href="#MyReviews" title="MyReviews">Đánh giá</a></li> --}}
						</ul>
					</nav>
					<!--//inner navigation-->
					<!--MySettings-->
					<section id="MySettings" class="tab-content myaccount">
						<article class="mysettings">
							<h1 style="text-align: center;font-size:25px">Thông tin của bạn</h1>
							<table class="my-account">
								<tr>
									<th>Họ và Tên</th>
									<td>{{$user->name}}&nbsp&nbsp
										@if(Session::get('edit_name') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@endif	
										<!--edit fields-->
										<div class="edit_field myaccount" id="field1">
											<form action="{{route('userEdit_Name',['id'=>$id])}}" method="post">
												{{ csrf_field() }}
												<label for="new_name">Nhập tên mới: </label>
												<input type="text" id="name" name="name" required="required"/>
												<input type="submit" value="Cập nhật" name="editUserName" class="gradient-button" id="editUserName"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field1" class="gradient-button edit delete">Sửa</a></td>
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
										<div class="edit_field myaccount" id="field2">
											<form action="{{route('userEdit_Email',['id' => $id])}}" method="post" >
												{{ csrf_field() }}
												<label for="email">Nhập địa chỉ email mới: </label>
												<input type="email" id="email" name="email" />
												<input type="submit" value="Cập nhật" name="editEmail" class="gradient-button" id="editEmail"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field2" class="gradient-button edit delete">Sửa</a></td>
								</tr>
								<tr>
									<th>Mật khẩu: </th>
									<td>
										@if(Session::get('edit_pass') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@elseif( count($errors->password) >0)
											<i class="error_account">Đổi mật khẩu không thành công</i>
										@else
											••••••
										@endif
										<!--edit fields-->
										<div class="edit_field myaccount" id="field3">
											<form action="{{route('userEdit_Password',['id' => $id])}}" method="post">
												{{ csrf_field() }}
												<div class="input-pass">
													<label for="pass_old">Nhập mật khẩu cũ: </label>
													<input type="password" id="pass_old" class="show" name="pass_old" required="required"/>
													@if( $errors->has('pass_old') )
														<i class="error_account">{{$errors->first('pass_old')}}</i><br/>
													@endif
												</div>
												<div class="input-pass">
													<label for="pass_new">Nhập mật khẩu mới: </label>
													<input type="password" id="pass_new" class="show" name="pass_new" required="required"/>
													@if( $errors->has('pass_new') )
														<i class="error_account">{{$errors->first('pass_new')}}</i><br/>
													@endif
												</div>
												<div class="input-pass">
													<label for="confirm_pass_new">Nhập lại mật khẩu mới: </label>
													<input type="password" id="confirm_pass_new" class="show" name="confirm_pass_new" required="required"/>
													@if( $errors->has('confirm_pass_new') )
														<i class="error_account">{{$errors->first('confirm_pass_new')}}</i><br/>
													@endif
												</div>
												<input type="submit" value="Cập nhật" name="editPassword" class="gradient-button" id="editPassword"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field3" class="gradient-button edit delete">Sửa</a></td>
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
										<div class="edit_field myaccount" id="field4">
											<form action="{{route('userEdit_Phone',['id' => $id])}}" method="post">
												{{ csrf_field() }}
												<label for="phone">Nhập số điện thoại mới: </label>
												<input type="text" id="phone" name="phone" minLength="6" maxLength="12" required="required"/>
												<input type="submit" value="Cập nhật" name="editPhone" class="gradient-button" id="editPhone"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field4" class="gradient-button edit delete">Sửa</a></td>
								</tr>
								<tr>
									<th>Ảnh đại diện: </th>
									<td>
										<img src="{{$user->avatar}}" alt="avatar" width="70" height="70" style="margin: 0 auto;">
										@if(Session::get('edit_avatar') == 'success')
											<i class="done_account">{{Session::get('massage')}}</i>
										@elseif( count($errors->avatar) >0)
											<i class="error_account">{{$errors->avatar->first('avatar')}}</i><br/>
										@endif
										<!--edit fields-->
										<div class="edit_field myaccount" id="field5">
											<form action="{{route('userEdit_Avatar',['id' => $id])}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
												<label for="avatar">Chọn ảnh đại diện mới </label>
												<input type="file" id="avatar" name="avatar" /><br/>
												<input type="submit" value="Cập nhật" name="editAvatar" class="gradient-button success" id="editAvatar"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field5" class="gradient-button edit delete">Sửa</a></td>
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
										<div class="edit_field edit_address" id="field6">
											<form action="{{route('userEdit_Address',['id' => $id])}}" method="post" >
												{{ csrf_field() }}
												<label for="provinces">Tỉnh/Thành Phố</label>
												<select name="provinces" id="provinces">
													<option selected="selected"></option>
													@if($province)
														@foreach($province as $provinceVal)
															<option value="{{$provinceVal->matp}}">{{$provinceVal->name}}</option>
														@endforeach
													@endif
												</select>
												<label for="districts">Quận/Huyện</label>
												<select name="districts" id="districts">
													<option selected="selected"></option>
												</select>
												<label for="wards">Phường/Xã</label>
												<select name="wards" id="wards">
													<option selected="selected"></option>
												</select>
												<label for="address_detail">Địa chỉ cụ thể(không bắt buộc):</label>
												<textarea name="address_detail" id="address_detail" cols="10" rows="3"></textarea>
												<br/>
												<input type="submit" value="Cập nhật" name="editPhone" class="gradient-button" id="editPhone"/>
											</form>
										</div>
										<!--//edit fields-->
									</td>
									<td><a href="#field6" class="gradient-button edit delete">Sửa</a></td>
								</tr>
							</table>

						</article>
					</section>
					<!--//MySettings-->					
					<!--My Bookings-->
					<!--//My Bookings-->	
				</section>
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection