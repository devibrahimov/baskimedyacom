@extends('Admin.index')

@section('css')
    .form-horizontal input + span {
    position: relative;
    }

    .form-horizontal input + span::before {
    position: absolute;
    right: -20px;
    top: 5px;
    }

    .form-horizontal input:invalid {
    border: 2px solid red;
    }

    .form-horizontal input:invalid + span::before {
    content: '✖';
    color: red;
    }

    .form-horizontal input:valid + span::before {
    content: '✓';
    color: green;
    }

    .form-horizontal input:required {
    border-color: #800000;
    border-width: 3px;
    }

    .form-horizontal input:required:invalid {
    border-color: #c00000;
    }
@endsection


@section('content')



    <div class="row row-sm">
    @if(isset($setting))
        <!-- Col -->
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img borderer mb-5">
                                <img alt="" src="/uploads/setting/{{$setting->logo}}">
                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">{{$setting->name}}</h5>
                                    <p class="main-profile-name-text">{{$setting->slogan}}</p>
                                </div>
                            </div>
                            <h6>Meta title</h6>
                            <div class="main-profile-bio">
                                {{$setting->metatitle}}
                            </div><!-- main-profile-bio -->
                            <h6>Meta Description</h6>
                            <div class="main-profile-bio">
                                {{$setting->metadescription}}
                            </div><!-- main-profile-bio -->
                            <hr class="mg-y-30">
                            <h6>Biografi</h6>
                            <div class="main-profile-bio">
                                {{$setting->about}}
                             </div><!-- main-profile-bio -->
                        {{--  <div class="row">--}}
                        {{--  <div class="col-md-4 col mb20">--}}
                        {{--  <h5>947</h5>--}}
                        {{--  <h6 class="text-small text-muted mb-0">Followers</h6>--}}
                        {{-- </div>--}}
                        {{--  <div class="col-md-4 col mb20">--}}
                        {{--  <h5>583</h5>--}}
                        {{--  <h6 class="text-small text-muted mb-0">Tweets</h6>--}}
                        {{-- </div>--}}
                        {{--  <div class="col-md-4 col mb20">--}}
                        {{--  <h5>48</h5>--}}
                        {{--  <h6 class="text-small text-muted mb-0">Posts</h6>--}}
                        {{-- </div>--}}
                        {{-- </div>--}}
                            <hr class="mg-y-30">
                            <label class="main-content-label tx-13 mg-b-20">Social Media</label>
                            <div class="main-profile-social-list">
                                <div class="media">
                                    <div class="media-icon bg-primary-transparent text-primary">
                                        <i class="icon ion-logo-facebook"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Facebook (URL)</span> <a href="{{$setting->facebook}}">{{$setting->facebook}}</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-success-transparent text-success">
                                        <i class="icon ion-logo-instagram"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Instagram</span> <a href="{{$setting->instagram}}">{{$setting->instagram}}</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon ion-logo-youtube"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Youtube</span> <a href="{{$setting->youtube}}">{{$setting->youtube}}</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-danger-transparent text-danger">
                                        <i class="icon ion-md-link"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Web Site</span> <a href="{{$setting->website}}">{{$setting->website}}</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="mg-y-30">

                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label tx-13 mg-b-25">
                        İletişim Bilgileri
                    </div>
                    <div class="main-profile-contact-list">
                        <div class="media">
                            <div class="media-icon bg-primary-transparent text-primary">
                                <i class="icon ion-md-phone-portrait"></i>
                            </div>
                            <div class="media-body">
                                <span>Mobil</span>
                                <div>
                                    {{$setting->number}}
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-success-transparent text-success">
                                <i class="icon ion-fax"></i>
                            </div>
                            <div class="media-body">
                                <span>Telefon numarası</span>
                                <div>
                                    {{$setting->phone}}
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-success-transparent text-success">
                                <i class="icon ion-fax"></i>
                            </div>
                            <div class="media-body">
                                <span>Fax numarası</span>
                                <div>
                                    {{$setting->fax}}
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-info-transparent text-info">
                                <i class="icon ion-md-locate"></i>
                            </div>
                            <div class="media-body">
                                <span> Adress</span>
                                <div>
                                    {{$setting->address}}
                                </div>
                            </div>
                        </div>
                    </div><!-- main-profile-contact-list -->
                </div>
            </div>
        </div>
    @endif
        <!-- Col -->
        <div class="@if(isset($setting))col-lg-8 @else col-lg-12 @endif">
            <form action="@if(!isset($setting)) {{route('setting.store')}} @else {{ route('setting.update',$setting->id)}}@endif" class="form-horizontal" method="POST"  enctype="multipart/form-data" >
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">Personal Information</div>


                        {{ @csrf_field() }}
                        @if (isset($setting))
                            {{  method_field('PUT')}}
                        @endif


                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Firma Adı</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name"
                                           value="@if(isset($setting)){{ $setting->name  }}   @else{{old('name') }}@endif "
                                           required maxlength="150">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Firma Sloganı</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="slogan"
                                           value="@if(isset($setting)){{ $setting->slogan  }}@else{{old('slogan') }}@endif "
                                           required maxlength="200">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Firma Logosu</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="logo" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Meta Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="metatitle"  value="@if(isset($setting)){{ $setting->metatitle }}@else{{ old('metatitle') }}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Meta Description</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="metadescription" rows="2">@if(isset($setting)){{  $setting->metadescription  }}@else{{old('metadescription') }}@endif</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="mb-4 main-content-label">Contact Info</div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Email </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" value="@if(isset($setting)){{ $setting->email }}@else{{ old('email') }}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Website</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="website" value="@if(isset($setting)){{ $setting->website }}@else{{old('website') }}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Telefon</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="number" value="@if(isset($setting)){{$setting->number}}@else{{old('number')}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Telefon (Ofis)</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone" value="@if(isset($setting)){{$setting->phone}}@else{{old('phone')}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">FAX</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="fax" value="@if(isset($setting)){{$setting->fax}}@else{{old('fax')}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Adres</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control"   name="address" rows="2">@if(isset($setting)){{$setting->address}}@else{{old('address')}}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Google Harita kodu</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="map"  rows="2">@if(isset($setting)){{$setting->map}}@else{{old('map')}}@endif</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 main-content-label">Sosial Media</div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Facebook</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="facebook"   value="@if(isset($setting)){{$setting->facebook}}@else{{old('facebook')}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">İnstagram</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instagram"  value="@if(isset($setting)){{$setting->instagram}}@else{{old('instagram')}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Youtube</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="youtube" value="@if(isset($setting)){{$setting->youtube}}@else{{old('youtube')}}@endif" required >
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 main-content-label">Firma Hakkında</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Firma Biografisi</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="about" rows="4"  >@if(isset($setting)){{$setting->about}}@else{{old('about')}}@endif</textarea>
                                </div>
                            </div>
                        </div>


                </div>
                <div class="card-footer">
                    @if(isset($setting))
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Güncelle</button>

                    @else
                        <button type="submit" class="btn btn-success waves-effect waves-light">Kayıt Et</button>

                    @endif

                </div>
            </div>
            </form>
        </div>
        <!-- /Col -->
    </div>
@endsection


@section('js')

@endsection
