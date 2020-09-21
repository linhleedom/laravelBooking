@extends('partner.master')
@section('script')
    
@endsection
@section('title')
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
                    <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
                    <li>Restore Homestay</li>                                    
                </ul>
                <!--//crumbs-->
            </nav>
            <!--//breadcrumbs-->		
            <section class="three-fourth" style="width:100%">    
                @if(Session::get('thongbao') == 'success')
					<i class="notify-success">{{Session::get('massage')}}</i>
				@endif                
				<h1 style="text-align: center; font-size: 3em;">Danh sách Homestay đã xóa</h1>             
                    {{-- <div class="sort-by" style="width:98%;">
                        <ul class="sort custom" style="float: right;">
                            <li><label for="">Thêm Homestay </label>
                                <a href="{{route('addHomestay')}}" title="addHomestay" class="add">Thêm Homestay</a></label>
                            </li>
                        </ul>
                    </div>   --}}
                <div class="deals clearfix" >
                    <!--deal-->                    
                    @foreach ($homestayrestore as $Homestay)
                    <article class="one-fourth homestay-custom" >
                        <figure><a href="{{route('list-room',['id'=>$Homestay->id])}}" title=""><img src="{{asset('public/'.$Homestay->avatar)}}" alt="" width="270" height="152" /></a></figure>
                        <div class="details custom_details">
                            <h1 style="height: 35px;text-align: center;" >{{$Homestay->name}}
                                @if(empty($Homestay->point == ""))
                                <span  class="point" >
                                    {{$Homestay->point}}
                                </span><br>
                                @endif
                            </h1>    
                            <span class="price none-border">{{$Homestay->district->name}},&nbsp;{{$Homestay->province->name}}
                                <em>                                
                                    <img src="partner/images/ico/gps.png" alt="" width="22" height="22" />
                                </em>
                            </span>
                            <span class="price none-border" style="font-size: 13.5px;">Tổng phòng :  &nbsp; &nbsp;
                                <em>
                                    {{$Homestay->product->count()}}
                                </em>
                            </span> 
                            <span class="price none-border" style="font-size: 13.5px;">Tổng số phòng hoạt động:  &nbsp; &nbsp;
                                <em>
                                    {{$Homestay->product->where('status','1')->count()}}
                                </em>
                            </span>
                            <span class="price ">Số lượng ảnh ({{$Homestay->image->count()}})&nbsp; &nbsp;
                            </span>          
                            <a href="{{route('Restore_homestay',['id'=>$Homestay->id])}}" title="Xóa" class="custom-button danger " onclick="return confirm('Bạn muốn khôi phục Homestay ?')">Khôi phục Homestay</a>
                        </div>
                    </article>
                    <!--//deal-->
                    @endforeach
                </div>
            </section>
        </div>
        <!--//main content-->
    </div>
</div>
@endsection