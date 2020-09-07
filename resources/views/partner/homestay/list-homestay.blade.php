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
                    <li>Danh sách Homestay</li>                                    
                </ul>
                <!--//crumbs-->
            </nav>
            <!--//breadcrumbs-->		
            <section class="three-fourth" style="width:100%">     
                <div class="sort-by" style="width:98%;">
                    <ul class="sort custom" style="float: right;">
                        <li><label for="">Thêm Homestay </label>
                            <a href="{{route('addHomestay')}}" title="addHomestay" class="add">Thêm Homestay</a></label>
                        </li>
                    </ul>
                </div>           
                <div class="deals clearfix" >
                    <!--deal-->
                    <?php $i=0; ?>
                        @foreach ($homestaylist as $Homestay)                        
					<?php $i++; ?>
                    <article class="one-fourth homestay-custom" >
                        <figure><a href="{{url('partner/edit-list-homestay', ['id' => $Homestay->id])}}" title=""><img src="{{asset('public/'.$Homestay->avatar)}}" alt="" width="270" height="152" /></a></figure>
                        <div class="details">
                            <h1 style="height: 75px;" >{{$Homestay->name}}
                                <span  class="point" >
                                    {{$Homestay->point}}
                                </span><br>
                                <span class="price none-border" style="font-size: 15px">Trạng thái &nbsp; &nbsp;
                                    <em>
                                    @if ($Homestay->status == 1)                                    
                                        <a title=""  style="color:#32df5d ;font-size :12px">Hiện</a>
                                    @elseif($Homestay->status == 0)                                 
                                    <em> <a  title="" style="color:red  ;font-size :12px">Ẩn</a>
                                    @endif
                                    </em>
                                </span>
                            </h1>
                            <span class="price">Thêm ảnh &nbsp; &nbsp;
                                <em>                                
                                    <a href="{{url('partner/upload_images', ['id' => $Homestay->id])}}"><img src="partner/images/ico/plus.png" alt="" width="22" height="22" /></a>
                                </em>
                            </span>
                            <span class="price none-border">Thanh toán
                                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                                    @if ($Homestay->status_pay == 2)                                    
                                        <a title="Sửa"  style="color:#32df5d ;font-size :12px" >Đã Thanh toán </a>
                                    @elseif($Homestay->status_pay == 1)                                    
                                        <a title="Sửa"  style="color:yellow ;font-size :12px" >Đang xử lý </a>
                                    @elseif($Homestay->status_pay == 0)                                 
                                    <a href="" title="Sửa" style="color:red ;font-size :12px" >Chưa Thanh toán </a>
                                    @endif                                
                            </span>       
                            <div class="description" style="height: 110px;">
                                <p><br>{{$Homestay->title}} <a href="{{url('room-detail'.'?id='.$Homestay->id)}}" >Chi tiết</a></p>
                            </div>                     
                            <a href="{{url('partner/delete-homestay', ['id' => $Homestay->id])}}" title="Xóa" class="custom-button danger " >Xóa Homestay</a>
                        </div>
                    </article>
                    <!--//deal-->
                    <!--//deal-->
                    @endforeach
                    <!--bottom navigation-->
                    <div class="bottom-nav">
                        <!--pager-->
                        {{ $homestaylist->withQueryString()->links('vendor.pagination.custom') }}
                        {{-- endpager --}}
                        <!--//pager-->
                    </div>
                    <!--//bottom navigation-->
                </div>
            </section>
        <!--//three-fourth content-->
            <!--//top destinations-->
        </div>
        <!--//main content-->
    </div>
</div>
@endsection