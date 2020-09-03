@extends('partner.master')
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
@section('title')
List Homestay
@endsection
@section('main')
<div class="main" role="main">		
    <div class="wrap clearfix">
        <!--main content-->
        <div class="content clearfix">
            <!--breadcrumbs-->
            <nav role="navigation" class="breadcrumbs clearfix">
                <!--crumbs-->
                <ul class="crumbs">
                    <li><a href="{{url('partner/trangchu')}}" title="Home">Home</a></li>
                    <li><a href="{{asset('partner/home-add')}}">Thêm</a></li> 
                    <li>Danh sách Homestay</li>                                    
                </ul>
                <!--//crumbs-->
            </nav>
            <!--//breadcrumbs-->		
            
            <section class="full">
                <div class="deals clearfix">
                    <div style="text-align: center; font-size: 4.5em;margin-bottom: 50px;">Danh sách Homestay</div>
                    {{csrf_field()}}
                        <div colspan="2" 
									style="color: #32df5d;
										/* background-color: #f2dede; */
										border-color: #ebccd1;
										width: 500px;
										height: 50px;
										font-size: 1.5em;
								">
										{{Session::get('thongbao')}}
						</div>
                    <table class="list-homestay">
                        <tr>
                            <th>STT</th>
                            <th>Tên Homestay</th>
                            <th>Đánh giá</th>
                            <th>Trạng thái</th>
                            <th colspan="2">Trạng thái thanh toán</th>
                            <th></th>
                        </tr>
                        <?php $i=0; ?>
                        @foreach ($homestaylist as $Homestay)                        
						<?php $i++; ?>
                        <tr>
                        <td>{{$i}}</td>
                            <td>{{$Homestay->name}}</td>
                            <td>
                                <p style="font-size: medium;color: lightcoral">
                                    {{$Homestay->point}}/5
                                </p>
                            </td>
                            <td>{{($Homestay->status==0)?"Ẩn":"Hiện"}}</td>
                            <td colspan="2">
                                @if ($Homestay->status_pay == 1)                                    
                                    <a href="" title="Sửa" class="gradient-button success">Đã Thanh toán </a>
                                @else                                    
                                    <a href="" title="Sửa" class="gradient-button danger">Chưa Thanh toán </a>
                                @endif
                                {{-- DB thiếu cột trạng thái thanh toán --}}
                            </td>
                            <td>
                                <a href="{{url('partner/upload_images', ['id' => $Homestay->id])}}" title="Chi tiết" class="gradient-button add">Thêm file Ảnh </a>
                                <a href="{{url('partner/edit-list-homestay', ['id' => $Homestay->id])}}" title="Sửa" class="gradient-button ">Sửa </a>
                                <a href="{{url('partner/delete-homestay', ['id' => $Homestay->id])}}" title="Xóa" class="gradient-button delete" onclick="return confirm('Bạn có muốn xóa không')">Xóa</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </table>                    
                        <!--pager-->
                        {{ $homestaylist->withQueryString()->links('vendor.pagination.custom') }}
                        {{-- endpager --}}
                </div>
                           
                        
                
            </section>
            <!--//top destinations-->
        </div>
        <!--//main content-->
    </div>
</div>
@endsection