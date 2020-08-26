
<!-- START HEADER -->
<header class="header_wrap fixed-top dd_dark_skin transparent_header">
    <div class="light_skin main_menu_uppercase">
        <div class="container">
            <div class="top-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div   class="d-flex align-items-center justify-content-center justify-content-md-start"  >
                                <ul class="contact_detail text-center text-lg-left">
                                    <li ><i class="ti-mobile"></i><span>{{$setting->phone}}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center text-md-right">

                                @guest
                                    <ul class="header_list">
                                        <li><a href="{{route('site.login')}}" > <span >Giriş Yap</span></a></li>
                                        <li><a href="{{route('site.signup')}}" > <span >Kayıt ol</span></a></li>
                                    </ul>

                                @endguest
                                @auth
                                    <ul class="header_list">
                                        <li><a href="{{route('site.login')}}" ><i class="ti-user"></i><span >{{Auth::user()->name}}</span></a></li>
                                        <li><a href="#"  onclick="event.preventDefault(); document.getElementById('form-submit').submit()"> <i class="ti-shift-left-alt"></i><span >Çıkış yap</span></a></li>
                                    </ul>

                                    <form action="{{route('site.logout')}}" method="post" id="form-submit" style="display: none;">
                                        @csrf
                                    </form>
                                @endauth

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('site.index')}}">
                    <img class="logo_light" src="/assets/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="/assets/images/logo_dark.png" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li>
                            <a class="nav-link nav_item" href="{{route('site.index')}}">ANA SAYFA</a>
                        </li>
                        <li>
                            <a class="nav-link nav_item" href="{{route('site.product')}}">ÜRÜNLERİMİZ</a>
                        </li>
                        <li>
                            <a class="nav-link nav_item" href="{{route('site.about')}}">HAKKIMIZDA</a>
                        </li>
                        <li>
                            <a class=" nav-link nav_item" href="{{route('site.gallery')}}">GALERİ</a>
                        </li>
                        <li><a class="nav-link nav_item" href="{{route('site.contact')}}">İLETİŞİM</a></li>
                        </li>
                        <li><a class="nav-link nav_item" href="#">ÜCRETSİZ KATALOG</a></li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div><div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="assets/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                </li>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="assets/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                </li>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                                <p class="cart_buttons"><a href="#" class="btn btn-fill-line view-cart">View Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->
