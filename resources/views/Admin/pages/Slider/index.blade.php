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
                        <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                            <a href="{{route('slider.create')}}" class="btn btn-success btn-with-icon btn-block"><i class="typcn typcn-pen"></i> Yeni Ekle</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">Sıra</th>
                                <th class="wd-40p border-bottom-0">Slider Resimi</th>
                                <th class="wd-20p border-bottom-0">Başlık</th>
                                <th class="wd-20p border-bottom-0">Oluşturulma tarihi</th>
                                <th class="wd-15p border-bottom-0">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($sliders))
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->queue}}</td>
                                        <td style="height:200px;  background: url('/storage/uploads/thumbnail/slider/medium/{{$slider->image}}') no-repeat;
                                            background-size: cover;background-position: center center !important;">

                                        </td>
                                        <td>{{$slider->header}}</td>
                                        <td>{{$slider->created_at}}</td>
{{--                                        <td>{{date('d-m-Y',strtotime($user->created_at) ) }}</td>--}}
                                        <td>
                                            <div class="btn-icon-list">
                                                {{--                                              <a href="#" class="btn btn-indigo btn-icon"><i class="typcn typcn-eye"></i></a>--}}
                                                <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></a>

                                                <form class="btn btn-danger btn-icon" action="{{route('slider.destroy',$slider->id)}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-icon" ><i class="typcn typcn-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

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
    <script src="/admin/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatable/js/jszip.min.js"></script>
    <script src="/admin/plugins/datatable/js/pdfmake.min.js"></script>
    <script src="/admin/plugins/datatable/js/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="/admin/plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
@endsection
