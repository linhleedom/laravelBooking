@extends('partner.master')
@section('script')
@endsection
@section('title')
Total Revenue
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
                <h1 style="text-align: center; font-size: 3em;">Thống kê hóa đơn</h1>
                <form id="main-search">
                    <div class="forms">
                        <h4><span></span>Nhập thời gian bạn muốn</h4>
                        <div class="f-item datepicker">
                            <label for="datepicker1">Từ ngày</label>
                            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="datepicker1" /></div>
                        </div>
                        <div class="f-item datepicker">
                            <label for="datepicker2">Đến ngày</label>
                            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="datepicker2" /></div>
                        </div>
                        <div class="f-item select_status">
                            <label for="status">Trạng thái</label>
                            <select name="" id="status" class="select_option">
                                <option value="3">Tất cả</option>
                                <option value="0">Đã đặt phòng</option>
                                <option value="1">Hủy Phòng</option>
                                <option value="2">Xong</option>
                            </select>
                        </div>
                        <div class="f-item submit_search">
                            <input type="button" value="Tìm kiếm" name="Search" class="gradient-button" id="search_revenue">
                        </div>
                    </div>	
                </form>
                <div class="deals clearfix" id = "table_bill">
                    @include('partner/ajax/list-bill')
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
@section('script1')

$(document).ready(function() {
    $('#search_revenue').click(function() {
        var datepicker1 = $('#datepicker1').val();
        var datepicker2 = $('#datepicker2').val();
        var status = $('#status').val();
        $.ajax({
            type:"get",
            url: '../partner/get-time-bill',
            data:{datepicker1: datepicker1, datepicker2: datepicker2,status:status},
            success:function(res){       
                if(res.length !== 0){
                    $("#table_bill").empty();
                    $("#table_bill").html(res);
                }
            }
        });
    });    
});

@endsection