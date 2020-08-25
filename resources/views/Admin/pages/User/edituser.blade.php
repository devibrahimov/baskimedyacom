@extends('Admin.index')

@section('css')
@endsection


@section('content')

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Yeni Kullanıcı Ekle</h4>
                    <p class="mb-2">Site Kullanıcısı ve Yönetici olarak iki Kullanıcı tipi bulunmaktadır</p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{route('user.update',$user->id)}}" method="POST">
                        {{ csrf_field()}} {{  method_field('PUT')}}
                        <div class="form-group">
                            <input type="text" class="form-control"  id="inputName" name="name" value="{{$user->name}}" placeholder="İsim Soyisim" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="inputName" name="phone" value="" placeholder="Telefon" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="inputEmail3" name="email" value="{{$user->email}}" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="inputPassword3" name="password" value="" placeholder="Şifre" >
                        </div>
                        <div class="row mg-t-10">
                            <div class="col-lg-3 ">
                                <label class="rdiobox"><input @if($user->role == 0) {{' checked="" '}}@endif  value="0" required name="rdio" type="radio"> <span>Kullanıcı</span></label>
                            </div>
                            <div class="col-lg-3">
                                <label class="rdiobox"><input name="rdio" value="1" @if($user->role == 1) {{' checked="" '}}@endif required type="radio"> <span>Yönetici</span></label>
                            </div>

                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                                <button type="submit" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')
@endsection
