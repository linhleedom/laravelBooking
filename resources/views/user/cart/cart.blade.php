@if( $newCart != null )
    @foreach($newCart->product as $item)
        <ul class="popular-hotels order-detail">
            <li>
                <h3>{{$item['productInfo']->name}}</h3>
                <p>{{$item['productInfo']->roomType->name}}</p>
                <p>Giá <span class="price">{{ number_format( $item['productInfo']->prices*(100-$item['productInfo']->discount)/100,0,',','.' ) }}đ</span></p>
                <button class="btn_del_cart" title="Xóa">X</button>
            </li>
        </ul>
    @endforeach
@endif

<ul class="popular-hotels order-sum">
    <li>
        <h3>Tổng tiền: <span class="payment">{{ number_format( $newCart->totalPrice,0,',','.' ) }}đ</span> </h3>
        <p>Tổng số phòng: <i>{{$newCart->totalQuanty}}</i></p>
        @if( isset($datepicker1) && isset($datepicker2) )
            <p>Ngày nhận phòng: <i>{{$datepicker1}}</i></p>
            <p>Ngày trả phòng: <i>{{$datepicker2}}</i></p>
        @endif
    </li>
</ul>