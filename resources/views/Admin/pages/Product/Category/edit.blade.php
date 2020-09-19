@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm">

        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1">KATEGORİ DÜZENLE</h4>
                    <p class="mb-2">Bu ekranda var olan bir kategoriyi güncelleyebilirsiniz.</p>
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori adı</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Kategori adı"  value="{{$category->name}}">
                            </div>

                            @foreach(json_decode($category->meta) as $key => $meta)
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta {{$key }}</label>
                                <input type="text" class="form-control" name="meta{{$key}}" id="exampleInputEmail1" placeholder="Meta başlıq"  value="{{ $meta}}">
                            </div>
                            @endforeach


                        </div>
                        <button type="submit" class="btn btn-success mt-3 mb-0">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- row -->
@endsection


@section('js')
@endsection
