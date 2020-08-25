@extends('Admin.index')

@section('css')
     <!--Internal  Quill css -->
    <link href="/admin/plugins/quill/quill.snow.css" rel="stylesheet">
    <link href="/admin/plugins/quill/quill.bubble.css" rel="stylesheet">



@endsection


@section('content')
    <div class="row">

    <form action="@if(!isset($about)){{route('about.store')}}@else{{route('about.update',$about->id)}}@endif" method="POST" enctype="multipart/form-data">


        {{ @csrf_field() }}
        @if (isset($about))
            {{  method_field('PUT')}}
        @endif

        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Hakkımızda Bölümü İçerik Alanı
                    </div>

                        <div class="row row-sm mt-5">
                            <div class="col-lg-12">
                                <div class="main-content-label mg-b-5">
                                    Hakkımızda Metin Alanı
                                </div>
                                <div class="form-group mg-b-0">

                                    <input class="form-control" name="header" maxlength="150" required  type="text" value="@if(isset($about)){{ $about->header  }}@else{{old('header') }}@endif ">

                                </div>
                            </div>

                            <div class="col-lg-6 mt-5">
                                <div class="row">

                                    @if(isset($about->image))
                                    <div class="col-lg-12 mt-5">
                                        <div class="form-group  mg-b-0">
                                            <img src="/uploads/setting/{{$about->image}}" width="350px">
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-lg-12 mt-5">
                                        <div class="form-group  mg-b-0">
                                            <input class="form-control" type="file" name="image" accept="image/*" required >
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="main-content-label mg-b-5">
                                            Hakkımızda Metin Alanı
                                        </div>
                                        <p class="mg-b-20">Firma Hakkında içeriği bu alandan gire bilirsiniz .</p>
                                        <div class="ql-wrapper ql-wrapper-demo bg-gray-100">
                                           <textarea name="content" id="content" required class="content">@if(isset($about)){{ $about->content  }}@else{{old('content') }}@endif </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="card-footer">
                        @if(isset($about))
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Güncelle</button>

                        @else
                            <button type="submit" class="btn btn-success waves-effect waves-light">Kayıt Et</button>

                        @endif

                    </div>


                </div>
            </div>
        </div>



    </form>

    </div>

@endsection


@section('js')
    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {

            CKEDITOR.replace('content')
        })
    </script>


    <!-- Switcher js -->
{{--    <script src="/admin/switcher/js/switcher.js"></script>--}}
@endsection
