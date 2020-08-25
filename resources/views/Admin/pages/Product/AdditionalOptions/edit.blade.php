@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->

    <div class="row row-sm">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1">Vertical Form</h4>
                    <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('additionaloptions.update',$additionaloption->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-lg-3 col-xl-3 col-md-12 col-sm-12">
                                <label for="exampleInputEmail1">Seçenek</label>
                                <input type="text" class="form-control" name="name"  placeholder="Option"  value="{{$additionaloption->name}}">
                            </div>
                            <div class="form-group col-lg-3 col-xl-3 col-md-12 col-sm-12">
                                <label for="exampleInputEmail1">Seçenek kodu</label>
                                <input type="text" class="form-control" name="option_code" placeholder="Opns"  value="{{$additionaloption->option_code}}">
                            </div>
                            <div class="form-group col-lg-3 col-xl-3 col-md-12 col-sm-12">
                                <label for="exampleInputEmail1">Seçenek fiyatı</label>
                                <input type="text" class="form-control" name="price"  placeholder="1.12"  value="{{$additionaloption->price}}">
                            </div>
                            <div class="form-group col-lg-3 col-xl-3 col-md-12 col-sm-12">
                                <label for="exampleInputEmail1">Seçenek fiyatı</label>
                            <select  class="form-control" name="parent_id">
                               <option value="">Seçenek Kategorisi</option>
                                @foreach($parents as $parent)

                                <option  {{$additionaloption->parent_id == $parent->id ? 'selected': ''}}  value="{{$parent->id}}">{{$parent->name}}</option>
                                @endforeach
                           </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 mb-0">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- row -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">SIMPLE TABLE</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="#">Learn more</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-25p border-bottom-0">Seçenek</th>
                                <th class="wd-25p border-bottom-0">Seçenek Kategorisi</th>
                                <th class="wd-25p border-bottom-0">Seçenek kodu</th>
                                <th class="wd-20p border-bottom-0">Fiyat</th>
                                <th class="wd-15p border-bottom-0">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($options))
                                @foreach($options as $option)
                                    <tr>
                                        <td>{{$option->name}}</td>
                                        <td>
                                            @if ($option->parent == NULL)
                                                {{'-------'}}
                                            @else
                                                {{$option->parent->name}}
                                            @endif
                                        </td>
                                        <td>{{$option->option_code}}</td>
                                        <td>{{$option->price}}</td>

                                        <td>
                                            <div class="btn-icon-list">
                                                {{--                                              <a href="#" class="btn btn-indigo btn-icon"><i class="typcn typcn-eye"></i></a>--}}
                                                <a href="{{route('additionaloptions.edit',$option->id)}}" class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></a>

                                                <form class="btn btn-danger btn-icon" action="{{route('additionaloptions.destroy',$option->id)}}" method="post">
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

@section('js')
@endsection
