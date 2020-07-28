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
                        <tr>
                            <td>1</td>
                            <td>Luxury Homestay Demo</td>
                            <td>
                                <div class="range-wrap">
                                    <div class="range-value" id="rangeV"></div>
                                    <input id="range" type="range" min="1" max="5" value="200" step="">
                                </div>
                            </td>
                            <td>Ẩn</td>
                            <td colspan="2">
                                <a href="edit-list-homestay.html" title="Sửa" class="gradient-button edit1">Thanh toán </a>
                            </td>
                            <td>
                                <a href="homestay.html" title="Chi tiết" class="gradient-button add">Chi tiết</a>
                                <a href="edit-list-homestay.html" title="Sửa" class="gradient-button edit">Sửa </a>
                                <a href="" title="Xóa" class="gradient-button delete">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Luxury Homestay Demo2</td>
                            <td>
                                <div class="range-wrap">
                                    <div class="range-value" id="rangeV"></div>
                                    <input id="range" type="range" min="1" max="5" value="200" step="">
                                </div>
                            </td>
                            <td>Hiện</td>
                            <td colspan="2">Đã thanh toán</td>
                            <td>
                                <a href="homestay.html" title="Chi tiết" class="gradient-button add">Chi tiết</a>
                                <a href="edit-list-homestay.html" title="Sửa" class="gradient-button edit">Sửa </a>
                                <a href="" title="Xóa" class="gradient-button delete">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Luxury Homestay Demo3</td>
                            <td>
                                <div class="range-wrap">
                                    <div class="range-value" id="rangeV"></div>
                                    <input id="range" type="range" min="1" max="5" value="200" step="">
                                </div>
                            </td>
                            <td>Ẩn</td>
                            <td colspan="2">Đã thanh toán</td>
                            <td>
                                <a href="homestay.html" title="Chi tiết" class="gradient-button add">Chi tiết</a>
                                <a href="edit-list-homestay.html" title="Sửa" class="gradient-button edit">Sửa </a>
                                <a href="" title="Xóa" class="gradient-button delete">Xóa</a>
                            </td>
                        </tr>
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