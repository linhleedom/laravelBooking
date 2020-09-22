@if(count($product))
    @foreach( $product as $productVal )
        <!--deal-->
        @if($productVal->discount == 0)
            <article class="one-fourth">
        @else
            <article class="one-fourth" id="promo">
            <div class="ribbon-small">- {{$productVal->discount}}%</div>
        @endif
            <figure><a href="{{route('userRoomDetail').'?id='.$productVal->homestay->id.$url}}" title=""><img src="{{$productVal->homestay->avatar}}" alt="" width="270" height="152" /></a></figure>
            <div class="details">
                <h1>{{$productVal->homestay->name}}
                    <div class="stars">
                        <span class="point">{{$productVal->homestay->point}}</span>
                    </div>
                </h1>
                <span class="address"><a href="{{route('userSearch').'?address='.$productVal->homestay->province->name.$url}}">{{$productVal->homestay->province->name}}</a></span>
                <span class="address"><a href="{{route('userSearch').'?address='.$productVal->homestay->district->name.' - '.$productVal->homestay->province->name.$url}}">{{$productVal->homestay->district->name}}</a></span>
                @if( isset($datepicker1) && isset($datepicker2) )
                    <span class="address product_name">{{$productVal->roomType->name}}</span>
                    <span class="address">Phù hợp cho {{$productVal->roomType->capacity}} người</span>
                    <!-- <span class="rating">200</span> -->
                    <span class="price">
                        Giá 1 đêm  
                        <em>{{ number_format( $productVal->prices,0,',','.' ) }}đ</em><br/>
                    </span>
                @else
                    <span class="price">
                        Giá 1 đêm chỉ từ  
                        <em>{{ number_format( $productVal->homestay->product->min('prices'),0,',','.' ) }}đ</em> 
                    </span>
                @endif	
                    <div class="description">
                        <p>{{$productVal->homestay->title}}</p>
                    </div>
                <a href="{{route('userRoomDetail').'?id='.$productVal->homestay->id.$url}}" title="Book now" class="gradient-button">Chọn phòng</a>
            </div>
        </article>
        <!--//deal-->
    @endforeach
@else
    <h5>Chưa có homestay tại điểm này, vui lòng chọn địa điểm khác.</h5><br/>
@endif