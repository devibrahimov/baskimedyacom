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
                                <th class="wd-25p border-bottom-0">İsim SOYİSİM</th>
                                <th class="wd-25p border-bottom-0">Email</th>
                                <th class="wd-20p border-bottom-0">Telefon</th>
                                <th class="wd-20p border-bottom-0">Kayıt TARİHİ</th>
                                <th class="wd-15p border-bottom-0">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>

                          @if(isset($users))
                              @foreach($users as $user)
                                  <tr>
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->email}}</td>
                                      <td> {{$user->gsm}} </td>
                                      <td>{{date('d-m-Y',strtotime($user->created_at) ) }}</td>
                                      <td>
                                          <div class="btn-icon-list">
{{--                                              <a href="#" class="btn btn-indigo btn-icon"><i class="typcn typcn-eye"></i></a>--}}
{{--                                              <a href="{{route('user.show',$user->id)}}" class="btn btn-primary btn-icon"><i class="typcn typcn-eye"></i></a>--}}

                                              <form class="btn btn-danger btn-icon" action="{{route('user.destroy',$user->id)}}" method="post">
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
