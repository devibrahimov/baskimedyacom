@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1">Yeni Slider Ekleyin</h4>
                    <hr    >
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="form-group col-lg-9">
                                <label for="exampleInputPassword1">Resim</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">Sıra</label>
                                <input type="number" step="1" class="form-control" name="queue">
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Slider üst yazı</label>
                                <input type="text" class="form-control" name="spam" >
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Başlık</label>
                                <input type="text" class="form-control" name="header">
                            </div>



                            <div class="form-group col-lg-12">
                                <label for="exampleInputPassword1">Metin</label>
                                <input type="text" class="form-control" name="content">
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="exampleInputPassword1">Yönlendirilecek Sayfa linki</label>
                                <input type="url" class="form-control" name="url">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-0">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->

@endsection


@section('js')

@endsection
