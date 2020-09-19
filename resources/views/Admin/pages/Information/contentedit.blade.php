@extends('Admin.index')

@section('css')
    <!--Internal  Quill css -->
    <link href="/admin/plugins/quill/quill.snow.css" rel="stylesheet">
    <link href="/admin/plugins/quill/quill.bubble.css" rel="stylesheet">



@endsection


@section('content')
    <div class="row">

        <form action="{{route('information.update',$info->id)}}" method="POST">

                @method('PUT')
                @csrf

            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Bilgilendirme Bölümü İçerik Alanı
                        </div>





                        <div class="row row-sm mt-5">
                            <div class="col-lg-12">
                                <div class="main-content-label mg-b-5">
                                    Bilgilendirme içerik Alanı
                                </div>
                                <div class="form-group mg-b-0">

                                    <select class="form-control" name="category" required >
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}" {{$cat->id==$info->InformationCats_id? 'selected':''}}>  {{$cat->name}}   </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="main-content-label mg-b-5">
                                            Bilgilendirme Metin Alanı
                                        </div>
                                        <p class="mg-b-20">Firma Hakkında içeriği bu alandan gire bilirsiniz .</p>
                                        <div class="ql-wrapper ql-wrapper-demo bg-gray-100">
                                            <textarea name="content" id="content"  class="content">{!!$info->content!!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Güncelle</button>


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
