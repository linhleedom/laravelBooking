@extends('partner.master')
@section('script')
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
                    <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
                    <li>Danh sách Homestay</li>                                    
                </ul>
                <!--//crumbs-->
            </nav>
            <!--//breadcrumbs-->		
            <section class="three-fourth" style="width:100%">    
                @if(Session::get('thongbao') == 'success')
					<i class="notify-success">{{Session::get('massage')}}</i>
				@endif                
				<h1 style="text-align: center; font-size: 3em;">Danh sách Homestay</h1>  
                @if(empty(Auth::user()->phone ))
                    <div class="alert"><i class="alert-danger">Vui lòng cập nhật số điện thoại trước khi tạo Homestay</i></div>
                @elseif(empty(Auth::user()->xaid))
                    <div class="alert"><i class="alert-danger">Vui lòng cập nhật địa chỉ trước khi tạo Homestay</i></div>
                @else               
                    <div class="sort-by" style="width:98%;">
                        <ul class="sort custom" style="float: right;">
                            <li><label for="">Thêm Homestay </label>
                                <a href="{{route('addHomestay')}}" title="addHomestay" class="add">Thêm Homestay</a></label>
                            </li>
                        </ul>
                    </div>  
                <div class="deals clearfix" >
                    <!--deal-->                    
                        @foreach ($homestaylist as $Homestay)
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
                            <span class="price none-border" style="font-size: 13.5px;">Trạng thái &nbsp; &nbsp;
                                <em>
                                @if ($Homestay->status == 1)                                    
                                    <a title=""  style="color:#32df5d ;font-size :12px">Hiện</a>
                                @elseif($Homestay->status == 0)                                 
                                <em> <a  title="" style="color:red  ;font-size :12px">Ẩn</a>
                                @endif
                                </em>
                            </span> 
                            <span class="price none-border" style="border: none;margin : 0 auto">Thanh toán
                                    @if ($Homestay->status_pay == 2)                                    
                                        <a title=""  style="color:#32df5d ;font-size :12px;float:right;text-decoration: none;" >Đã Thanh toán </a>
                                    @elseif($Homestay->status_pay == 1)                                    
                                        <a title=""  style="color:yellow ;font-size :12px;float:right;text-decoration: none;" >Đang xử lý </a>
                                    @elseif($Homestay->status_pay == 0)                                 
                                    <a href="" title="" style="color:red ;font-size :12px;float:right;text-decoration: none;" >Chưa Thanh toán </a>
                                    @endif                                
                            </span> 
                        <span class="price none-border">Thêm ảnh ({{$Homestay->image->count()}})&nbsp; &nbsp;
                                <em>                                
                                    <a href="{{url('partner/upload_images', ['id' => $Homestay->id])}}"><img src="partner/images/ico/plus.png" alt="" width="22" height="22" /></a>
                                </em>
                            </span>
                            <span class="price" style="border: none;margin : 0 auto"><label for="">Chỉnh sửa &nbsp; &nbsp;</label> 
                                <em>                                
                                    <a href="{{url('partner/edit-list-homestay', ['id' => $Homestay->id])}}"><img src="partner/images/ico/edit.png" alt="" width="16" height="16" /></a>
                                </em>
                            </span>     <br>               
                            <a href="{{route('delete_homestay', ['id' => $Homestay->id])}}" title="Xóa" class="custom-button danger " onclick="return confirm('Bạn muốn xóa Homestay ?')">Xóa Homestay</a>
                        </div>
                    </article>
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
            
            @endif
            </section>
        <!--//three-fourth content-->
            <!--//top destinations-->
        </div>
        <!--//main content-->
    </div>
</div>
@endsection