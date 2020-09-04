
<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">

    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6   d-xs-none    ">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">

                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>{{$setting->phone}}</span></li>
                        </ul>
                        <ul class="contact_detail text-center text-lg-left ml-3">
                            <li><i class="ti-email"></i><span>{{$setting->email}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        @guest
                            <ul class="header_list">
                                {{--                            <li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Compare</span></a></li>--}}
                                <li><a href="{{route('site.login')}}"><i class="ti-user"></i><span>Giriş Yap</span></a>
                                </li>
                                <li><a href="{{route('site.signup')}}"> <span>Kayıt ol</span></a></li>
                            </ul>
                        @endguest
                            @auth('admin')
                                <li><a href="{{route('admin.home')}}"><i class="ti-control-shuffle"></i><span>Yönetim paneli</span></a>
                                </li>
                            @endauth

                        @auth
                            <ul class="header_list">



                                <li>
                                    <a href="{{route( 'user.profil',[Str::slug(Auth::user()->name),\Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id) ] )}}"><i
                                            class="ti-user"></i><span>{{Auth::user()->name}}</span></a>

                                 </li>
                                <li><a href="#"
                                       onclick="event.preventDefault(); document.getElementById('form-submit').submit()">
                                        <i class="ti-shift-left-alt"></i><span>Çıkış yap</span></a></li>
                                <form action="{{route('site.logout')}}" method="post" id="form-submit"
                                      style="display: none;">
                                    @csrf
                                </form>

                            </ul>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('site.index')}}">
                    <img class="logo_light" src="/uploads/setting/{{$setting->logo}}" alt="baskimedya-logo"
                         title="Baskimedya logo"/>
                    <img class="logo_dark" src="/uploads/setting/{{$setting->logo}}" alt="baskimedya-logo"
                         title="Baskimedya logo"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li>
                            <a class="nav-link nav_item" href="{{route('site.index')}}">ANA SAYFA</a>
                        </li>

                        <li>
                            <a class="nav-link nav_item" href="{{route('site.about')}}">HAKKIMIZDA</a>
                        </li>
                        <li>
                            <a class="nav-link nav_item" href="{{route('site.product')}}">ÜRÜNLERİMİZ</a>
                        </li>
                        <li>
                            <a class="nav-link nav_item" href="{{route('site.services')}}">HİZMETLERİMİZ</a>
                        </li>
                        <li>
                            <a class=" nav-link nav_item" href="{{route('site.gallery')}}">GALERİ</a>
                        </li>
                        <li><a class="nav-link nav_item" href="{{route('site.contact')}}">İLETİŞİM</a></li>
                        </li>
                        <li><a class="nav-link nav_item" href="{{route('site.catalogue')}}">ÜCRETSİZ KATALOG</a></li>

                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">

                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i
                                class="linearicons-cart"></i><span id="cart_count" class="cart_count">0</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <div id="cartproducts">
                                {{--  basket products --}}
                            </div>
                            <div class="cart_footer">
                                <p class="cart_buttons"><a
                                        href="@if (\Illuminate\Support\Facades\Auth::user()) {{route('site.addtocart',\Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id))}} @else {{route('site.login')}} @endif"
                                        class="btn btn-fill-line view-cart">Sebete Git</a>
                                    {{--                                    <a href="#" class="btn btn-fill-out checkout">Ödeme Sayfası</a>--}}
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->
