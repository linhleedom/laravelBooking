@extends('partner.master')
@section('title')
Information Bill
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
                        <li><a title="thông tin hóa đơn">Thông tin hóa đơn</a></li>                                  
                    </ul>
                    <!--//crumbs-->
                
                </nav>
                <!--//breadcrumbs-->

                <!--three-fourth content-->
                <section class="three-fourth" style="width: 100%">
                
					<h1 style="text-align: center;font-size: 40px;">Thông tin hóa đơn khách hàng</h1>
                    
                    <!--MySettings-->
                    <section id="MyBookings" class="tab-content tab-booking">
                        <!--booking-->
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
                        <?php $i = 0 ;?>
                        @foreach ($order as $orderVal)
                        <?php $i++ ;?>
                            <article class="bookings">
                            <h1 style="color: #ff6666;font-size:20px;text-align: center;text-transform: uppercase;">Đơn hàng thứ {{$i}}</h1>
                                <div class="b-info">
                                    <table>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <td>{{$orderVal->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Homestay</th>
                                            @foreach ($product as $valPro)
                                                    @if($orderVal->product_id == $valPro->id)
                                                        <td>{{$valPro->homestay->name}}</td>
                                                    @endif
                                            @endforeach
                                        </tr>
                                        <tr>    
                                            <th>Loại phòng</th>
                                            @foreach ($product as $valPro)
                                            @if($orderVal->product_id == $valPro->id)
                                                <td>{{$valPro->name}}</td>
                                            @endif                                                
                                            @endforeach
                                            {{-- {{$orderVal->product->name}} --}}
                                        </tr>
                                        <tr>    
                                            <th>Ảnh phòng</th>
                                            @foreach ($product as $valPro)
                                            @if($orderVal->product_id == $valPro->id)
                                                <td><img style="display: inline-block;" src="{{asset('public/'.$valPro->avatar)}}" alt="Image" width="300px" height="150px" ></td>
                                            @endif                                                
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>Check-in Date</th>
                                            <td>{{date("d-m-Y",strtotime($orderVal->date_start))}}</td>
                                        </tr>
                                        <tr>
                                            <th>Check-out Date</th>
                                            <td>{{date("d-m-Y",strtotime($orderVal->date_end))}}</td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái</th>
                                            @if($orderVal->status == 0)
													<td><strong class="gradient-button danger">Trống</strong></td>
											@elseif($orderVal->status == 1)
													<td><strong class="gradient-button  warning">Đã có người đặt</strong></td>
											@endif
                                        </tr>
                                        <tr>
                                            <th> Price:</th>
                                            @foreach ($product as $valPro)
                                            @if($orderVal->product_id == $valPro->id)                                                
                                                <td><strong>{{$valPro->prices}}</strong></td>
                                            @endif                                                
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                                
                                <div class="actions">
                                    {{-- <a href="{{url('partner/edit-order', ['id' => $orderVal->id])}}" class="gradient-button add">Sửa </a> --}}
                                    {{-- <a href="{{url('partner/delete-bill', ['id' => $orderVal->id])}}" class="gradient-button delete">Xóa hóa đơn</a> --}}
                                </div>
                            </article>									
                        @endforeach
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