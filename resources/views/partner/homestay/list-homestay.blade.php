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
                    <li><a href="#" title="Home">Home</a></li>   
                    <li>Danh sách Homestay</li>                                    
                </ul>
                <!--//crumbs-->
            </nav>
            <!--//breadcrumbs-->		
            
            <section class="full">
                <div class="deals clearfix">
                    <div style="text-align: center; font-size: 4.5em;margin-bottom: 50px;">Danh sách Homestay</div>
                    <table class="list-homestay">
                        <tr>
                            <th>STT</th>
                            <th>Tên Homestay</th>
                            <th>Đánh giá</th>
                            <th>Trạng thái</th>
                            <th colspan="2">Trạng thái thanh toán</th>
                            <th></th>
                        </tr>
                        @foreach ($homestaylist as $Homestay)                            
                        <tr>
                        <td>{{$Homestay->id}}</td>
                            <td>{{$Homestay->name}}</td>
                            <td>
                                <p style="font-size: medium;color: lightcoral">
                                    {{$Homestay->point}}/5
                                </p>
                            </td>
                            <td>{{$Homestay->status}}</td>
                            <td colspan="2">
                                <a href="" title="Sửa" class="gradient-button edit1">Thanh toán </a>
                                {{-- DB thiếu cột trạng thái thanh toán --}}
                            </td>
                            <td>
                                <a href="{{asset('homestay/views-homestay'.$Homestay->user_id)}}" title="Chi tiết" class="gradient-button add">Chi tiết</a>
                                <a href="{{asset('homestay/edit-homestay'.$Homestay->user_id)}}" title="Sửa" class="gradient-button edit">Sửa </a>
                                <a href="{{asset('homestay/delete-homestay'.$Homestay->user_id)}}" title="Xóa" class="gradient-button delete" onclick="return confirm('Bạn có muốn xóa không')">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
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