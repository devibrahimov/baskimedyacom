@extends('Site.index')

@section('content')
    @include('Site.partials.bread')

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Giriş Yap</h3>
                            </div>
                            @if ($errors->any())

                                @foreach ($errors->all() as $error)
                                    <div class="form-note text-center  " id="hatamesaji" style="color: #FF324D">
                                        {{$error}}
                                    </div>
                                @endforeach

                            @endif
                            <form method="post" action="{{route('site.login')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required  class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required type="password" name="passwd" placeholder="Şifre">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="remembered" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Beni Hatırla</span></label>
                                        </div>
                                    </div>
{{--                                    <a href="#">Şifremi Unuttum</a>--}}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Giriş Yap</button>
                                </div>
                            </form>
                            <div class="different_login">
                                <span> <a href="{{route('site.signup')}}" >kayıt ol</a></span>
                            </div>
{{--                            <ul class="btn-login list_none text-center">--}}
{{--                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>--}}
{{--                                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>--}}
{{--                            </ul>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->


@endsection
