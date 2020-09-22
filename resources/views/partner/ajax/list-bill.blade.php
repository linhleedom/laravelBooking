<!--deal-->  
@if(isset($listBill))
<table  class = "table_bill" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Số lượng phòng</th>
            <th>Trạng thái</th>
            <th>Ngày đặt hàng</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th style="padding: 0 32px;text-align: right;">Giá</th>
        </tr>
    </thead>
    @foreach($listBill as $listBillVal)
            @if ($listBillVal->status == 2)                                    
                <tr class="alert_success">
            @elseif($listBillVal->status == 1)                                    
                <tr class="alert_danger">
            @elseif($listBillVal->status == 0)                                 
                <tr class="alert_warning">
            @endif
            <td>{{$listBillVal->id}}</td>
            <td>{{$listBillVal->order->count()}}</td>
            <td>
            @if ($listBillVal->status == 2)                                    
                <div class="alert_success">Xong</div>
            @elseif($listBillVal->status == 1)                                    
                <div class="alert_danger">Đã hủy</div>
            @elseif($listBillVal->status == 0)                                 
                <div class="alert_warning">Đã đặt phòng</div>
            @endif
            </td>
            <td>{{date( "d-m-Y", strtotime( $listBillVal->created_at ))}}</td>
            <td>{{date("d-m-Y",strtotime($listBillVal->order->first()->date_start))}}</td>
            <td>{{date("d-m-Y",strtotime($listBillVal->order->first()->date_end))}}</td>
            <td style="text-align: right;">{{ number_format( $listBillVal->payments,0,',','.' ) }}đ</td>
        </tr>
    @endforeach    
    @if($listBillVal->status == 2 )
    <tr>
        <td>Tổng tiền</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right;">
            {{number_format($listBill->where('status',2)->sum('payments'),0,',','.')}}đ</td>
    </tr>
    @endif
</table>
@endif
