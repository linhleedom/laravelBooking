@extends('partner.master')
@section('title')
Edit Order {{$order->id}}
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
						<li><a href="{{url('partner/list-bills')}}" title="Hóa đơn">Hóa đơn</a></li>  
                        <li><a href="{{url('partner/information-order',['id' => $list_Bill->id])}}" title="thông tin hóa đơn">Thông tin hóa đơn</a></li>
                    <li>Sửa đơn hàng {{$order->id}}</li>                           
                    </ul>
                    <!--//crumbs-->
                
                </nav>
                <!--//breadcrumbs-->

                <!--three-fourth content-->
                <section class="three-fourth" style="width: 100%">
                
					<h1 style="text-align: center;font-size: 40px;">Sửa đơn hàng{{$order->id}}</h1>
                    
                    <!--MySettings-->
                    <section id="MyBookings" class="tab-content tab-booking">
                        <!--booking-->
                        {{-- @foreach ($order as $orderVal) --}}
                            <form id="booking" method="post" action="" class="booking ">
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
                                <article class="bookings">
                                    <div class="b-info">
                                        <table>
                                            <tr>
                                                <th style="width: 30%;">Mã hóa đơn</th>
                                                <td>{{$order->bill_id}}</td>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" >Trạng thái</th>
                                                <td>
                                                    <label for="status1" class="gradient-button warning" >Đã có người đặt  &nbsp </label>
                                                    <input class="gradient-button warning" required type="radio" id="status1" name="status"  value="0" @if($order->status ==0) checked  @endif/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>                                                
                                                    <label for="status2" class="gradient-button danger">Trống  &nbsp</label>  
                                                        <input required type="radio" id="status2" name="status"  value="1" @if($order->status == 1) checked  @endif/>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    
                                    <div class="actions">
                                        
                                        <a href="{{url('partner/information-order', ['id' => $list_Bill->id])}}" class="gradient-button" >Thông tin các hóa đơn</a>
                                        <input type="submit" class="gradient-button add" value="Cập nhật" id="Edit" >
                                    </div>
                                </article>					    
                            </form>				
                        {{-- @endforeach --}}
                        <!--//booking-->
                    </section>
                    <!--//MySettings-->
                    
                </section>
            </div>
            <!--//main content-->
        </div>
    </div>
    <!--//main-->
@endsection