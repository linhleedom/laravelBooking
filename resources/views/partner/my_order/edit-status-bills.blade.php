@extends('partner.master')
@section('title')
Edit Bill
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
                
					<h1 style="text-align: center;font-size: 40px;">Sửa trạng thái đơn</h1>
                    
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
                                                <th rowspan="3" >Trạng thái</th>
                                                <td><div>
                                                    <label for="status1">Đã đặt  &nbsp </label>  </div> 
                                                        <input required type="radio" id="status1" name="status"  value="0" @if($bill->status ==0) checked  @endif/>
                                                       
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>                                                
                                                    <label for="status2">Đã hủy  &nbsp 
                                                        <input required type="radio" id="status2" name="status"  value="1" @if($bill->status == 1) checked  @endif/>
                                                    </label>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>                                                
                                                    <label for="status3">Xong  &nbsp 
                                                        <input required type="radio" id="status3" name="status"  value="2" @if($bill->status == 2) checked  @endif/>
                                                    </label>  
                                                </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    
                                    <div class="actions">
                                        
                                        <a href="{{url('partner/list-bills')}}" class="gradient-button" >Danh sách các hóa đơn</a>
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