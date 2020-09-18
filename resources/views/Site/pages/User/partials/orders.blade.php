<div class="card">
    <div class="card-header">
        <h3>Orders</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Sipariş id</th>
                    <th>Sipariş Tarihi</th>
                    <th>Ödenen Tutar</th>
                    <th>Onay</th>
                </tr>
                </thead>
                <tbody >
               @foreach($orders as $order)

                    <tr style=" background-color: @if($order->order_completed == 1) #00d700
                    @elseif($order->order_completed == -1) #f60000
                    @elseif($order->order_completed == 2) #00cdd7
                    @else #f6f6f6
                    @endif " >
                        <td>#{{$order->merchant_oid}}</td>
                        <td>{{date('d-M-Y',strtotime($order->created_at) )}}</td>
                        <td>{{$order->totalPrice}} <span>₺</span></td>
                        <td>@if($order->order_completed == 0){{'Onay Bekliyor'}}
                            @elseif($order->order_completed == 1){{'Baskıya Verildi'}}
                            @elseif($order->order_completed == 2){{'Baskısı Bitti'}}
                            @else{{'Onaylanmadı'}}
                            @endif</td>
                    </tr>

             @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
