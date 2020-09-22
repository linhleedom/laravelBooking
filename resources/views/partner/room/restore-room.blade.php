@extends('partner.master')
@section('script')
@endsection
@section('title')
Khôi phục phòng
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
                    <li>Danh sách phòng đã xóa </li>                                    
                </ul>
                <!--//crumbs-->
            </nav>
            <!--//breadcrumbs-->	
            
            <section class="full">
                <h1 style="text-align: center; font-size: 3em;">Danh sách phòng của Homestay</h1>
                <div class="deals clearfix">
                    <!--deal-->
                    @foreach($roomrestore as $ViewRoom)
                    <article class="one-fourth">
                        <figure><a title=""><img src="{{asset('public/'.$ViewRoom->avatar)}}" alt="" width="270" height="152" /></a></figure>
                        <div class="details">
                            <h1>{{$ViewRoom->homestay->name}}</h1>
                            <span class="address"> Tên • <a title="tên phòng"  style="color:red ;font-size :12px" >{{$ViewRoom->name}}</a></span>
                            <span class="address">	Loại • <a title="loại phòng"  style="color:red ;font-size :12px" >{{$ViewRoom->roomType->name}}</a></span>
                            <span class="address status_room_custom" >Trạng thái  •  
                                @if ($ViewRoom->status == 1)                                    
                                    <a title="Sửa"  style="color:#32df5d ;font-size :12px" >Hiện</a>
                                @elseif($ViewRoom->status == 0)                                 
                                    <a href="" title="Sửa" style="color:red ;font-size :12px" >Ẩn</a>
                                @endif
                            </span>
                            @if($ViewRoom->discount != 0)
                            <span class="rating like" style="margin-bottom : 10px">&nbsp;
                                    {{$ViewRoom->discount}}%
                            </span>
                            @elseif($ViewRoom->discount == 0)
                            <span class="rating nosale" style="margin-bottom : 10px">&nbsp;
                                No Sales
                            </span>
                            @endif
                            <span class="price none-border">Thêm ảnh ({{$ViewRoom->image->count()}})&nbsp; &nbsp;
                                <em>                                
                                    <a href="{{route('UploadImageRoom',['id'=>$ViewRoom->id])}}"><img src="partner/images/ico/plus.png" alt="" width="22" height="22" /></a>
                                </em>
                            </span>
                            <span class="price none-border" style="border-top : none;">Giá phòng  <em>{{number_format( $ViewRoom->prices,0,',','.' ) }}đ</em> </span>
                            <span class="price"  style="border: none;margin : 0 auto"><label for="">Chỉnh sửa &nbsp; &nbsp;</label> 
                                <em>                                
                                    <a href="{{url('partner/edit-list-room', ['id' => $ViewRoom->id])}}"><img src="partner/images/ico/edit.png" alt="" width="16" height="16" /></a>
                                </em>
                            </span>
                            <a href="{{route('Restore_Room', ['id' => $ViewRoom->id])}}" title="Restore" class="gradient-button delete" onclick="return confirm('Bạn muốn xóa phòng ?')">Khôi phục</a>
                        </div>
                    </article>
                    @endforeach
                    <!--//deal-->
                </div>
                
            </section>
            <!--//top destinations-->
        </div>
        <!--//main content-->
    </div>
</div>
@endsection
