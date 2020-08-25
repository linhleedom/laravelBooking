@if( Session::has("Cart") != null )
    @foreach(Session::get("Cart")->product as $item)
        <ul class="popular-hotels order-detail">
            <li>
                <h3>{{ucfirst($item['productInfo']->name)}}</h3>
                <p>{{$item['productInfo']->roomType->name}}</p>
                <p>Giá <span class="price">{{ number_format( $item['productInfo']->prices*(100-$item['productInfo']->discount)/100,0,',','.' ) }}đ</span></p>
                <button class="btn_del_cart" onclick="DelItem({{$item['productInfo']->id}})" title="Xóa">X</button>
            </li>
        </ul>
    @endforeach
    <ul class="popular-hotels order-sum">
        <li>
            <h3>Tổng tiền: <span class="payment">{{ number_format( Session::get("Cart")->totalPrice,0,',','.' ) }}đ</span> </h3>
            <p>Tổng số phòng: <i>{{Session::get("Cart")->totalQuanty}}</i></p>
        </li>
    </ul>
@endif

