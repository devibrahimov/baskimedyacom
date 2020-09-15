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
                <tbody>
               @foreach($orders as $order)
                    <tr>
                        <td>#{{$order->merchant_oid}}</td>
                        <td>{{date('d-M-Y',strtotime($order->created_at) )}}</td>
                        <td>{{$order->totalPrice}} <span>₺</span></td>
                        <td> {{$order->order_completed == 1? 'Onaylandı' :'Onay Bekliyor'}}</td>
                    </tr>
             @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
