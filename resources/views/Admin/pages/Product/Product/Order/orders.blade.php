@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{isset($type)?$type:'Siparişleri'}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">{{isset($type)?$type:'Siparişleri'}}  aşağıdakı listeden Takip ede bilirsiniz </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Şipariş id</th>
                                <th class="wd-15p border-bottom-0">Soyadı </th>
                                <th class="wd-20p border-bottom-0">Kullanıcı Adı</th>
                                <th class="wd-20p border-bottom-0">Sipariş Tarihi</th>
                                <th class="bg-gradient-blue wd-15p border-bottom-0">Tutar</th>
                                <th class="wd-15p border-bottom-0">Sipariş Detayı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->merchant_oid}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->surname}}</td>
                                <td>{{$order->created_at}}</td>
                                <td class="bg-gradient-blue text-white">{{$order->totalPrice}} ₺</td>
                                <td><a href="{{route('orderdetail',$order->id)}}"><span class="btn btn-sm btn-info"> <i class="fas fa-eye"> </i>Sipariş Detayı</span></a></td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>
    <!-- /row -->
@endsection


@section('js')
    <!-- Internal Data tables -->
    <script src="/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.dataTables.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatable/js/responsive.dataTables.min.js"></script>
    <script src="/admin/plugins/datatable/js/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.bootstrap4.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatable/js/jszip.min.js"></script>
    <script src="/admin/plugins/datatable/js/pdfmake.min.js"></script>
    <script src="/admin/plugins/datatable/js/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
    <!--Internal  Datatable js -->
    <script src="/admin/js/table-data.js"></script>
@endsection
