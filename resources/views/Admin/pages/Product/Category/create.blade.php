@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm">

        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1">Vertical Form</h4>
                    <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori adı</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Kategori adı"  value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta başlıq</label>
                                <input type="text" class="form-control" name="metatitle" id="exampleInputEmail1" placeholder="Meta başlıq"  value="{{old('metatitle')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Açıklama Metini</label>
                                <input type="text" class="form-control" name="metadescription" id="exampleInputEmail1" placeholder="Meta Açıklama Metini"  value="{{old('metadescription')}}">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success mt-3 mb-0">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Default Form</h4>
                    <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Adı</th>
                                <th>Kategori</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                         @foreach($cats as $cat)
                            <tr>
                                <th scope="row">{{$cat->id}}</th>
                                <td>{{$cat->name}}</td>
                                <td>Ana Kategori</td>
                                <td>
                                    <div class="btn-icon-list">
                                        {{--                                              <a href="#" class="btn btn-indigo btn-icon"><i class="typcn typcn-eye"></i></a>--}}
                                        <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></a>

                                        <form class="btn btn-danger btn-icon" action="{{route('category.destroy',$cat->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
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
    </div>
    <!-- row -->
@endsection


@section('js')
@endsection
