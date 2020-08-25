@extends('partner.master')
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
                        @php
                            $i= 0; foreach ($homestaylist as $Homestay) : $i++;
                        @endphp
                        
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
                                <a href="" title="Sửa" class="gradient-button edit1">Thanh toán </a>
                                {{-- DB thiếu cột trạng thái thanh toán --}}
                            </td>
                            <td>
                                <a href="{{url('partner/upload_images', ['id' => $Homestay->id])}}" title="Chi tiết" class="gradient-button add">Thêm file Ảnh </a>
                                <a href="{{url('partner/edit-list-homestay', ['id' => $Homestay->id])}}" title="Sửa" class="gradient-button ">Sửa </a>
                                <a href="{{url('partner/delete-homestay', ['id' => $Homestay->id])}}" title="Xóa" class="gradient-button delete" onclick="return confirm('Bạn có muốn xóa không')">Xóa</a>
                            </td>
                        </tr>
                        @php
                            endforeach
                        @endphp
                    </table>
                </div>
                <div class="separator"></div>
                
            </section>
            <!--//top destinations-->
        </div>
        <!--//main content-->
    </div>
</div>
@endsection