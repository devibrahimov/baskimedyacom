@extends('Admin.index')

@section('css')

    <link href="/admin/plugins/inputtags/inputtags.css" rel="stylesheet">

@endsection


@section('content')
    <div class="card " id="tabs-style3">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <!-- div -->
                    <div class="d-md-flex">
                        <div class="">
                            <div class="panel panel-primary tabs-style-4">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu mr-3">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            @foreach($cats as $cat)

                                            <li><a href="#tab{{$cat->id}}" class="{{$loop->first ? 'active': ''}}"  data-toggle="tab"> {{$cat->name}}</a></li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-style-4">
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    @foreach($infos as $info)
                                    <div class="tab-pane {{$loop->first?'active':''}}" id="tab{{$info->InformationCats_id}}">
                                        <nav class="breadcrumb-4">
                                            <ol class="breadcrumb breadcrumb-style1">

                                                <li class="breadcrumb-item "> <a   href="{{route('information.edit',$info->id)}}"><i class="fas fa-pen"> </i> Düzenle</a> </li>
                                            </ol>
                                        </nav>
                                        {!! $info->content  !!}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <!-- Internal Input tags js-->
    <script src="/admin/plugins/inputtags/inputtags.js"></script>
    <!--- Tabs JS-->
    <script src="/admin/plugins/tabs/jquery.multipurpose_tabcontent.js"></script>
    <script src="/admin/js/tabs.js"></script>
@endsection
