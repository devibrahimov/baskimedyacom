<?php

$instajson = file_get_contents('https://www.instagram.com/tiryakioglupixelreklam/?__a=1');
if (isset($instajson)) {
    $instadata = json_decode($instajson, true);
}
$image[] = '';
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="baskimedya">
    <meta name="keywords" content="baskimedya,baski,medya">

    <!-- SITE TITLE -->
    <title>Baskimedya.com</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/assets/css/linearicons.css">
    <link rel="stylesheet" href="/assets/css/web.css">


    <link rel="stylesheet" href="/admin/plugins/sumoselect/sumoselect.css"/>

    <link href="/admin/plugins/gallery/gallery.css" rel="stylesheet"/>
</head>

<body>

{{--<!-- LOADER -->--}}
{{--<div class="preloader">--}}
{{--    <div class="lds-ellipsis">--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- END LOADER -->--}}

<!-- Home Popup Section -->

<!-- End Screen Load Popup Section -->

@include('Site.layouts.header')

@yield('content')
<!-- START FOOTER -->
<footer class="footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <!-- <div class="row"> -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">İletişim Bilgileri</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>{{$setting->address}}</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">{{$setting->email}}</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>{{$setting->number}}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <ul class="social_icons rounded_social">
                            <li><a href="{{$setting->facebook}}" class="sc_facebook"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li><a href="{{$setting->youtube}}" class="sc_youtube"><i
                                        class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="{{$setting->instagram}}" class="sc_instagram"><i
                                        class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Faydalı Linkler</h6>
                        <ul class="widget_links">
                            @foreach($infocategory as $inform)
                                <li><a href="#">{{$inform->name}}</a></li>
                            @endforeach
                            <li><a href="#">Bize Ulaşın</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Hesap İşlemleri</h6>
                        <ul class="widget_links">
                            <li><a href="#">Hesabım</a></li>
                            <li><a href="#">İndirim Kuponları</a></li>
                            <li><a href="#">Sipariş Geçmişi</a></li>
                            <li><a href="#">Sipariş Takibi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">Instagram</h6>
                        <ul class="widget_instafeed instafeed_col4">
                            @if(isset($instadata))
                                @foreach(array_slice($instadata['graphql']['user']['edge_owner_to_timeline_media']['edges'],0,8) as $image)
                                    <li><a href="#"><img src="<?=$image['node']['display_url']?>" alt="insta_img"
                                                         style="width: 100px;height: 100px;"><span class="insta_icon"><i
                                                    class="ti-instagram"></i></span></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="bottom_footer bg_dark4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-left">© created by <a href="https://dijipr.com"
                                                                                onclick="return ! window.open(this.href);">DijiPR</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-md-right">
                        <li><a href="#"><img src="/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

</body>
@include('Site.partials.jsscripts')
<!-- scripts js -->
@yield('js')
<script src="/assets/js/scripts.js?v=W2w349005t34SFGER45343"></script>

</html>
