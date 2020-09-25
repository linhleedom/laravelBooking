@extends('partner.master')
@section('title')
Rating Homestay
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
                        <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
                        <li><a href="{{route('list-homestay')}}" title="list-homestay">Danh sách Homestay</a></li>  
                        <li><a title="Đánh giá">Đánh giá</a></li>                                  
                    </ul>
                    <!--//crumbs-->
                
                </nav>
                <!--//breadcrumbs-->

                <!--three-fourth content-->
                <section class="three-fourth" style="width: 100%">
                    <div class="deals clearfix">
                        <img src="partner/images/ico/AccountRate.png" width="100px"  alt="" style="margin: 0 auto">
						<!--My Bookings-->
							<section id="MyBookings" class="tab-content tab-booking">
                                @if(Session::get('thongbao') == 'success')
                                    <i class="notify-success">{{Session::get('massage')}}</i>
                                @endif  
								<!--booking-->
								<?php $i = 0 ;?>
								@foreach ($rate as $rateVal)
								<?php $i++ ;?>
									<article class="bookings ratings">
                                        <h1><strong class="gradient-button success stt ">{{$i}}</strong> | Your review of <strong style= "color: #dc3545;font-size: 18px;">{{$rateVal->homestay->name}}</strong></h1>
										<div class="b-info">
											<table class="my-comments">							
                                                <tr>
                                                    <th>Số hóa đơn :</th>
                                                    <td>{{$rateVal->bill_id}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Khách hàng đánh giá :</th>
                                                    <td>{{$rateVal->bill->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email :</th>
                                                    <td>{{$rateVal->bill->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Số điện thoại :</th>
                                                    <td>{{$rateVal->bill->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th >Trạng thái</th>
                                                    @if($rateVal->status == 1)
                                                        <td><strong class="gradient-button success">Hiện</strong></td>
                                                    @elseif($rateVal->status == 0)									
                                                        <td><strong class="gradient-button danger ">Ẩn</strong></td>
                                                    @endif
                                                </tr>
                                            </table>
                                            <article class="myreviews ratings_homestay">
                                                <div class="score">
                                                    <span class="achieved">{{$rateVal->point}}</span>
                                                    <span>  / 5</span>
                                                </div>
                                                <div class="reviews">
                                                    @if($rateVal->point >= 3 && $rateVal->point <=5)										
                                                    <div class="pro"><p>{{$rateVal->comment}}</p></div>
                                                    @elseif($rateVal->point <3)										
                                                    <div class="con"><p>{{$rateVal->comment}}</p></div>
                                                    @endif</div>
                                            </article>
                                            <div class="reviews">
                                            </div>
                                        </div>
										<div class="actions">
                                            @if ($rateVal->status == 1)								
                                                <a href="{{route('ChangeStatus', ['bill_id'=>$rateVal])}}" class="gradient-button danger">Change-status</a>
                                            @elseif($rateVal->status == 0)								
                                                <a href="{{route('ChangeStatus', ['bill_id'=>$rateVal])}}" class="gradient-button success">Change-status</a>
                                            @endif
                                        </div>
									</article>									
								@endforeach
								<div class="bottom-nav" style="background: none">
                                    <!--back up button-->
                                    <a href="#" class="scroll-to-top" title="Back up">Top</a> 
                                    <!--//back up button-->
                                    
                                    <!--pager-->
                                        {{ $rate->withQueryString()->links('vendor.pagination.custom') }}
                                    <!--//pager-->
                                </div>
								<!--//booking-->
							</section>
						<!--//My Bookings-->
					</div>

                </section>
            </div>
            <!--//main content-->
        </div>
    </div>
    <!--//main-->
@endsection