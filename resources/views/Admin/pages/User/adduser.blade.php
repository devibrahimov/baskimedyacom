@extends('Admin.index')

@section('content')


    <div class="row row-sm">
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">YENİ KULLANICI EKLE</h4>
                    <p class="mb-2">Bu sayfadan yeni yönetici ekleyebilirsiniz.</p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{route('user.store')}}" method="POST">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control"  id="inputName" name="name" value="{{old('name')}}" placeholder="İsim" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  id="inputName" name="surname" value="{{old('surname')}}" placeholder="Soyisim" required>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <input type="number" class="form-control" id="inputName" name="phone" value="{{old('phone')}}" placeholder="Telefon" required>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <input type="email" class="form-control" id="inputEmail3" name="email" value="{{old('email')}}" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="inputPassword3" name="password" value="{{old('password')}}" placeholder="Şifre" required>
                        </div>
{{--                        <div class="row mg-t-10">--}}
{{--                            <div class="col-lg-3 ">--}}
{{--                                <label class="rdiobox"><input checked="" value="0" required name="rdio" type="radio"> <span>Kullanıcı</span></label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <label class="rdiobox"><input name="rdio" value="1" required type="radio"> <span>Yönetici</span></label>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">YÖNETİCİ Tablosu</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Yönetim Paneline erişimi olan yönetici tablosu</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-25p border-bottom-0">İsim SOYİSİM</th>
                                <th class="wd-25p border-bottom-0">Email</th>
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

                                        <td>{{date('d-m-Y',strtotime($user->created_at) ) }}</td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{--                                              <a href="#" class="btn btn-indigo btn-icon"><i class="typcn typcn-eye"></i></a>--}}

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
    </div>

@endsection






@section('css')
@endsection


@section('js')

@endsection
