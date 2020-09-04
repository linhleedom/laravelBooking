<h1>Còn {{$product->count()}} phòng có sẵn</h1>
<div class="text-wrap">
    @if( isset($datepicker1) && isset($datepicker2) )
        <p>Phòng có sẵn từ <span class="date">{{$datepicker1}}</span> đến <span class="date">{{$datepicker2}}</span>.</p>
    @endif
</div>
<!-- <h1>Room types</h1> -->
<ul class="room-types">
    @foreach($product as $productVal)
        <!--room-->
        <li>
            <figure class="left"><img src="{{$productVal->avatar}}" alt="" width="270" height="152" />
            <a href="{{$productVal->avatar}}" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>
            <div class="meta">
                <p class="pro-name">{{ucfirst($productVal->name)}}</p>
                <h2 class="type-name">{{$productVal->roomType->name}}</h2>
                @if( $productVal->discount != 0 )
                    <p>Giảm giá: <span class="discount">{{$productVal->discount}}%</span></p>
                @endif
                <p>Đã bao gồm 10% VAT </p>
                <p>Thanh toán tại homestay</p>
                <a href="javascript:void(0)" title="more info" class="more-info">+ Thêm</a>
            </div>
            <div class="room-information">
                <div class="row">
                    <span class="first">Phù hợp:</span>
                    <span class="second"><span class="capacity">{{$productVal->roomType->capacity}} x</span><img src="user/images/ico/person.png" alt="" /></span>
                </div>
                @if( $productVal->discount == 0 )
                    <div class="row price">
                        <span class="first">Giá: </span>
                        <span class="second">{{ number_format( $productVal->prices,0,',','.' ) }}đ</span>
                    </div>
                @else
                    <div class="row price">
                        <span class="first">Giá: </span>
                        <span class="second price-old"><strike>{{ number_format( $productVal->prices,0,',','.' ) }}</strike>đ</span>
                    </div>
                    <div class="row price">
                        <span class="first">&nbsp</span>
                        <span class="second price-new">{{ number_format( $productVal->prices*(100-$productVal->discount)/100,0,',','.' ) }}đ</span>
                    </div>
                @endif	
                @if( isset($datepicker1) && isset($datepicker2) )
                    <a onclick="AddCart({{$productVal->id}}, {{$homestayVal->id}}, '{{$datepicker1}}', '{{$datepicker2}}')" class="gradient-button no-href">Chọn</a>
                @else
                    <a onclick="Alert()" class="gradient-button no-href">Chọn</a>
                @endif
            </div>
            <div class="more-information">
                <p>{{$productVal->description}}</p>
                <p><strong>Tiện ích và đồ dùng:</strong></p>
                <div class="text-wrap utilities">	
                    <ul class="three-col">
                        @foreach($productVal->utilities as $utilitiesVal)
                            <li>{{$utilitiesVal->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <p><strong>Kích thước phòng:</strong>  {{$productVal->area}} m<sup>2</sup></p>
            </div>
        </li>
        <!--//room-->
    @endforeach
</ul>