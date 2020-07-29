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
                                <!--Star rating-->
                                <dd style="display: block; height: auto;">
                                    <div id="star" data-rating="3" style="cursor: pointer; width: 130px;">
                                        <img src="user/images/ico/star-rating-on.png" alt="1" title="bad">&nbsp;
                                        <img src="user/images/ico/star-rating-on.png" alt="2" title="poor">&nbsp;
                                        <img src="user/images/ico/star-rating-on.png" alt="3" title="regular">&nbsp;
                                        <img src="user/images/ico/star-rating-off.png" alt="4" title="good">&nbsp;
                                        <img src="user/images/ico/star-rating-off.png" alt="5" title="gorgeous">
                                        <input type="hidden" name="score" value="3">
                                    </div>
                                </dd>
                                {{-- end-star-rating--}}
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
<script>
    $(document).ready(function() {
        $('#star').raty({
            score    : 3,
            click: function(score, evt) {
            alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
        }
        });
    });
</script>
@endsection