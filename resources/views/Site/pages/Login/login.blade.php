@extends('Site.index')

@section('content')


    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Giriş Yap</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->


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
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Beni Hatırla</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Şifremi Unuttum</a>
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
