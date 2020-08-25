@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1">Verdiyiniz Hizmetleri buradan ekleyin</h4>
                    <hr    >
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('services.store')}}" method="post" enctype="multipart/form-data">
                   @csrf
                        <div class="">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hizmet adı</label>
                                <input type="text" class="form-control" name="name" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Başlık</label>
                                <input type="text" class="form-control" name="header">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta Title</label>
                                <input type="text" class="form-control" name="metatitle">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta Description</label>
                                <input type="text" class="form-control" name="metadescription">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Resim</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">

                                <div class="ql-wrapper ql-wrapper-demo bg-gray-100">
                                    <textarea name="content" id="content" class="content"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->

@endsection


@section('js')
    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {

            CKEDITOR.replace('content')
        })
    </script>
@endsection
