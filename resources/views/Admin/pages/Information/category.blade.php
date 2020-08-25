@extends('Admin.index')

@section('content')


    <div class="row row-sm">
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">BİLGİLENDİRME Sayfası Ekle</h4>
                    <p class="mb-2">Site Kullanıcıları Bilgilendirmelerinin Tutulduöu Sayfalar </p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{route('inform.addcategory')}}" method="POST">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <label for="inputName"> Yeni Sayfa Ekle</label>
                            <input type="text" class="form-control"  id="inputName" name="name" value="{{old('name')}}" required>
                        </div>


                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                                <button type="submit" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">

                <div class="card-body">




                           <div class="table-responsive">
                               <table class="table table-bordered mg-b-0 text-md-nowrap">
                                   <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Kategori</th>
                                       <th>İşlemler</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($cats as $cat)
                                   <tr>
                                       <th scope="row">{{$cat->id}}</th>
                                       <td>{{$cat->name}}</td>
                                       <td>
                                           <div class="btn-icon-list">
                                               {{--                                              <a href="#" class="btn btn-indigo btn-icon"><i class="typcn typcn-eye"></i></a>--}}
                                               <a href="{{route('inform.edit',$cat->id)}}" class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></a>

                                               <form class="btn btn-danger btn-icon" action="{{route('inform.delete',$cat->id)}}" method="post">
                                                   @csrf
                                                   {{ method_field('DELETE') }}
                                                   <button type="submit" class="btn btn-danger btn-icon" ><i class="typcn typcn-trash"></i></button>
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

@endsection






@section('css')
@endsection


@section('js')

@endsection
