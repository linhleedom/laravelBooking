

@if(isset($sessionCart))
    @if( Session::has($sessionCart) && isset($datepicker1) && isset($datepicker2))
        @foreach(Session::get($sessionCart)->product as $item)
            <ul class="popular-hotels order-detail">
                <li>
                    <h3>{{ucfirst($item['productInfo']->name)}}</h3>
                    <p>{{$item['productInfo']->roomType->name}}</p>
                    <p>Giá <span class="price">{{ number_format( $item['productInfo']->prices*(100-$item['productInfo']->discount)/100,0,',','.' ) }}đ</span></p>
                    <button class="btn_del_cart" onclick="DelItem({{$item['productInfo']->id}} , {{$item['productInfo']->homestay->id}}, '{{$datepicker1}}', '{{$datepicker2}}' )" title="Xóa">X</button>
                </li>
            </ul>
        @endforeach
        <ul class="popular-hotels order-sum">
            <li>
                <h3>Tổng tiền: <span class="payment">{{ number_format( Session::get($sessionCart)->totalPrice,0,',','.' ) }}đ</span> </h3>
                <p>Tổng số phòng: <i>{{Session::get($sessionCart)->totalQuanty}}</i></p>
            </li>
        </ul>
        @if( isset($datepicker1) && isset($datepicker2) )
            <ul class="popular-hotels order-sum order-date">
                <li>
                    <p>Ngày nhận phòng: <i>{{$datepicker1}}</i></p>
                    <p>Ngày trả phòng: <i>{{$datepicker2}}</i></p>
                </li>
            </ul>
        @endif
    @endif
@else
    @if( Session::has('Cart-homestay-'.$homestayVal->id) && isset($datepicker1) && isset($datepicker2) )
        @foreach(Session::get('Cart-homestay-'.$homestayVal->id)->product as $item)
            <ul class="popular-hotels order-detail">
                <li>
                    <h3>{{ucfirst($item['productInfo']->name)}}</h3>
                    <p>{{$item['productInfo']->roomType->name}}</p>
                    <p>Giá <span class="price">{{ number_format( $item['productInfo']->prices*(100-$item['productInfo']->discount)/100,0,',','.' ) }}đ</span></p>
                    <button class="btn_del_cart" onclick="DelItem( {{$item['productInfo']->id}} , {{$item['productInfo']->homestay->id}}, '{{$datepicker1}}', '{{$datepicker2}}' )" title="Xóa">X</button>
                </li>
            </ul>
        @endforeach
        <ul class="popular-hotels order-sum">
            <li>
                <h3>Tổng tiền: <span class="payment">{{ number_format( Session::get('Cart-homestay-'.$homestayVal->id)->totalPrice,0,',','.' ) }}đ</span> </h3>
                <p>Tổng số phòng: <i>{{Session::get('Cart-homestay-'.$homestayVal->id)->totalQuanty}}</i></p>
            </li>
        </ul>
        @if( Session::has('Cart-homestay-'.$homestayVal->id) == true && isset($datepicker1) && isset($datepicker2) )
            <ul class="popular-hotels order-sum order-date">
                <li>
                    <p>Ngày nhận phòng: <i>{{$datepicker1}}</i></p>
                    <p>Ngày trả phòng: <i>{{$datepicker2}}</i></p>
                </li>
            </ul>
        @endif
    @endif    
@endif

