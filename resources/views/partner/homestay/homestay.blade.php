@extends('partner.master')
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
                    <li><a href="#" title="Home">Home</a></li>  
                    <li>Thêm Homestay</li>                               
                </ul> 
                <!--//crumbs-->
                
                <!--top right navigation-->
                <!-- <ul class="top-right-nav">
                    <li><a href="#" title="Back to results">Back to results</a></li>
                    <li><a href="#" title="Change search">Change search</a></li>
                </ul> -->
                <!--//top right navigation-->
            </nav>
            <!--//breadcrumbs-->

            <!--three-fourth content-->
                <section class="three-fourth form-booking">
                    <h1 style="text-align: center;text-transform: uppercase;">Thông tin homestay</h1> <h1>...</h1>
                    <form id="booking" method="post" action="booking-step2.html" class="booking ">
                        <fieldset>
                            <h3 style="margin-top: 20px;"><span>01</span> Địa chỉ Homestay của bạn </h3>
                            <div class="row twins">
                                <div class="f-item custom-item">
                                    <label for="text">Tên chỗ nghỉ </label>
                                    <input type="text" id="name" name="name" />
                                </div>
                                <div class="f-item custom-item">
                                    <label>Tỉnh (Thành Phố)</label>
                                    <select>
                                        <option selected="selected">Chọn</option>
                                        <option>Hà Nội</option>
                                        <option>Hồ Chí Minh</option>
                                    </select>
                                </div>
                                <div class="f-item custom-item">
                                    <label>Quận (HUyện)</label>
                                    <select>
                                        <option selected="selected">Chọn</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="f-item custom-item">
                                    <label>Phường Xã</label>
                                    <select>
                                        <option selected="selected">Chọn</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <!-- <span class="info">You’ll receive a confirmation email</span> -->
                            </div>

                            <h3 style="margin-top: 20px;"><span>02</span> Loại Homestay</h3>
                            <div class="row twins">
                                <div class="f-item custom-item">
                                    <label>Loại căn hộ </label>
                                    <input type="text" id="brand_name" name="brand_name" />
                                </div>
                                
                                <div class="f-item custom-item">
                                    <label for="">Trạng thái của Homestay</label>
                                    <input type="checkbox" id="status" name="status"  value=""/> &nbsp <b>Ẩn/Hiện</b>
                                </div>
                            </div>
                            <!--MyReviews-->
                            <section id="MyReviews" class="tab-content">
                                <h1 style="margin-top: 50px; border: none; color: red; text-align: center;text-transform: uppercase;">Đánh giá</h1>
                                <article class="myreviews">
                                    <h1>Loại phòng</h1>
                                    <div class="score">
                                        <span class="achieved">8 </span>
                                        <span> / 10</span>
                                    </div>
                                    <div class="reviews">
                                        <div class="pro"><p> Điểm tốt</p></div>
                                        <div class="con"><p>Điểm chưa tốt</p></div>
                                    </div>
                                </article>
                                
                                <article class="myreviews">
                                    <h1>Loại phòng	</h1>
                                    <div class="score">
                                        <span class="achieved">8 </span>
                                        <span> / 10</span>
                                    </div>
                                    <div class="reviews">
                                        <div class="pro"><p> Điểm tốt</p></div>
                                        <div class="con"><p>Điểm chưa tốt</p></div>
                                    </div>
                                </article>
                                
                                <article class="myreviews">
                                    <h1>Loại phòng	</h1>
                                    <div class="score">
                                        <span class="achieved">8 </span>
                                        <span> / 10</span>
                                    </div>
                                    <div class="reviews">
                                        <div class="pro"><p> Điểm tốt</p></div>
                                        <div class="con"><p>Điểm chưa tốt</p></div>
                                    </div>
                                </article>
                            </section>
                            <!--//MyReviews-->
                        </fieldset>
                    </form>
                </section>
            <!--//three-fourth content-->
        </div>
        <!--//main content-->
    </div>
</div>
<!--//main-->

@endsection
