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
                        <h4 class="card-title mg-b-0">Ürün Kategorileri </h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">   <a href="{{route('category.create')}}" class="btn btn-success btn-with-icon"><i class="typcn typcn-edit"></i> Yeni Kategori Ekle</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-25p border-bottom-0">Kategori adı</th>
                                <th class="wd-25p border-bottom-0">Meta başlık</th>
                                <th class="wd-20p border-bottom-0">Meta açıklama</th>
                                <th class="wd-20p border-bottom-0">Oluşturma tarihi</th>
                                <th class="wd-15p border-bottom-0">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($cats as $cat)
                                    <tr>
                                        <td> {{$cat->name}}</td>
                                        @foreach(json_decode($cat->meta,true) as  $value)
                                        <td>{{$value }} </td>
                                        @endforeach
                                        <td> {{$cat->created_at}} </td>
                                        <td>
                                            <div class="btn-icon-list">
                                                 <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></a>

                                                <form class="btn btn-danger btn-icon" action="{{route('category.destroy',$cat->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-icon" ><i class="typcn typcn-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
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


@section('datatables')
    <!-- Internal Data tables -->
    <script src="/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.dataTables.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatable/js/responsive.dataTables.min.js"></script>
    <script src="/admin/plugins/datatable/js/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.bootstrap4.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.bootstrap4.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatable/js/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
@endsection
