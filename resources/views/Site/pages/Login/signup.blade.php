@extends('Site.index')


@section('content')


    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Register</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Register</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">

                                <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Kayıt ol</h3>
                                </div>

                                    @if ($errors->any())
                                        <div class="different_login">
                                  <span> Hata Mesajı</span>
                                        </div>
                                        @foreach ($errors->all() as $error)
                                            <div class="form-note text-center  " id="hatamesaji" style="color: #FF324D">
                                                {{$error}}
                                            </div>

                                        @endforeach
                                        <div class="different_login">

                                        </div>
                                    @endif

                                <form method="post" action="{{route('site.signup')}}" role="form" method="post">
                                    <div class="form-group">
                                         <label class="form-check-label" for="exampleCheckbox2"><span>İsim Soyisim *</span></label>
                                        <input type="text" required="" class="form-control" name="name"  value="{{old('name')}}">
                                    </div>
                                    @csrf
                                    <div class="form-group">
                                         <label class="form-check-label" for="exampleCheckbox2"><span>Email *</span></label>
                                        <input type="text" required="" class="form-control" name="email" value="{{old('email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>Telefon numaranız *</span></label>
                                        <input type="number" required="" class="form-control" name="phone" value="{{old('phone')}}" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>Kullanıcı Şifreniz *</span></label>
                                        <input class="form-control" required="" id="txtPassword" type="password" name="password" value="{{old('password')}}">
                                    </div>
                                    <div class="form-group">

                                         <label class="form-check-label" for="exampleCheckbox2"><span>Şifreyi Tekrar Girin *</span></label>
                                        <input class="form-control" id="txtConfirmPassword" required="" type="password" name="password_confirmation"  value="{{old('')}}">
                                    </div>
                                    <div class="login_footer form-group">
{{--                                        <div class="chek-form">--}}
{{--                                            <div class="custome-checkbox">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">--}}
{{--                                                <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block"   id="btnSubmit"   name="register">Kayıt ol</button>
                                    </div>
                                </form>
                                <div class="different_login">
{{--                                    <span> or</span>--}}
                                </div>
{{--                                <ul class="btn-login list_none text-center">--}}
{{--                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>--}}
{{--                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>--}}
{{--                                </ul>--}}
                                <div class="form-note text-center  ">Bir Kullanıcı hesabınız varmıydı? <a href="{{route('site.login')}}">Hesabına Giriş yap</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>Subscribe Our Newsletter</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->



@endsection



@section('js')
    <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#txtPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword) {

                    var htmlString = "Şifreler Eşleşmiyor.Tekrar deneyin";
                    $('#hatamesaji').text( htmlString );
                    return false;
                }
                return true;
            });
        });
    </script>
@endsection
