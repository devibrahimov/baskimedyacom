@extends('Site.index')


@section('content')

    @auth
    <!-- Home Popup Section -->
    @if(session()->has('mesaj'))
        <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                        </button>
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <div class="background_bg h-100" data-img-src="/assets/images/sendingemail.jpg"></div>
                            </div>
                            <div class="col-sm-7">
                                <div class="popup_content">
                                    <div class="popup-text">
                                        <div class="heading_s4">
                                            <h4>Kaydınız Başarı ile Gerçekleştirildi</h4>
                                        </div>
                                        <p> Baskı Medya takımı olarak sizlere hizmet göstermekten memnuniyyet duyuyoruz</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End Screen Load Popup Section -->
    @endauth


    @if(session()->has('activation'))
        <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                        </button>
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <div class="background_bg h-100" data-img-src="/assets/images/sendingemail.jpg"></div>
                            </div>
                            <div class="col-sm-7">
                                <div class="popup_content">
                                    <div class="popup-text">
                                        <div class="heading_s4">
                                            <h4>Sayın {{session('activation')['name']}}</h4>
                                        </div>
                                        <p>Üye aktivasyon linki <a  style="color: #FF324D" href="{{session('activation')['email']}}">{{session('activation')['email']}}</a> adresine gönderildi. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif




    <!-- START SECTION BANNER -->
    <div class="banner_section full_screen staggered-animation-wrap">
        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow carousel_style2" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($betuls as $slider)


                <div class="carousel-item @if($loop->first) active @endif background_bg overlay_bg_50" data-img-src="/storage/uploads/thumbnail/slider/large/{{$slider->image}}">
                    <div class="banner_slide_content banner_content_inner">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 col-md-10">
                                    <div class="banner_content text_white text-center">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="fadeInDown" data-animation-delay="0.2s">{{$slider->spamtext}}</h5>
                                        <h2 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s">{{$slider->header}}</h2>
                                        <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s"> {{$slider->content}}</p>
                                        <a class="btn btn-white staggered-animation" href="{{$slider->url}}" data-animation="fadeInUp" data-animation-delay="0.5s">İncele</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
        </div>
    </div>
    <!-- END SECTION BANNER -->

        <!-- STAT SECTION ABOUT -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
               @if($about != NULL)
                    <div class="col-lg-6">

                        <div class="about_img scene mb-4 mb-lg-0 "style="height:400px;  background: url('/uploads/setting/{{$about->image}}') no-repeat;
                            background-size: cover;background-position: center center !important;">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>@if(isset($about)){!!$about->header!!}@endif</h2>
                        </div>@if(isset($about)){!!$about->content!!}@endif</div>
                     </div>
                @endif

                </div>
            </div>
        </div>
        <!-- END SECTION ABOUT -->
    <div class="section pb_20 small_pt">
        <div class="container-fluid px-2">
            <div class="row no-gutters">

              @foreach($services as $service)
                  <div class="col-md-4">
                    <div class=" sale_banner rounded-0">
                        <div class="card bg-dark text-white hover_effect1  rounded-0" style=" height:250px;  background: url('/storage/uploads/thumbnail/services/medium/{{$service->image}}') no-repeat;
                            background-size: cover;background-position: center center !important;">
                             <div class="card-img-overlay " style="background-color:rgba(0, 0, 0, 0.2);">
                                <h4 class="card-title text-white " style="background-color:rgba(0, 0, 0); padding:10px;">{{$service->name}}</h4>
                                <p class="card-text  text-white">{{$service->header}}</p>
                            </div>
                        </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>


        <!-- START SECTION SHOP -->
        <div class="section small_pt pb_70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s4 text-center">
                            <h2><a href="{{route('site.product')}}">Ürünlerimiz</a></h2>
                        </div>
                        <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
                    </div>
                </div>
                <div class="row shop_container">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="product_box text-center">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="/storage/uploads/thumbnail/products/small/{{$product->image}}" height="280.55px" alt="{{$product->name}}" title="{{$product->name}}">
                                </a>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{route('showProducts',[$product->id,$product->slug])}}">{{$product->name}}</a></h6>
                                <div class="product_price">
                                    <span class="price">${{$product->price}}</span>

                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:100%"></div>
                                    </div>
                                </div>
                                <div class="pr_desc">
                                    <p> {{$product->description}}</p>
                                </div>
                                <div class="add-to-cart">
                                    <a href="{{route('showProducts',[$product->id,$product->slug])}}" class="btn btn-fill-out btn-radius"><i class="icon-basket"></i> Sipariş ver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION CLIENT LOGO -->
        <div class="section small_pt">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h2>Referanslarımız</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>
                            @foreach($references as $ref)
                            <div class="item">

                                <div class="cl_logo">
                                    <img src="/storage/uploads/thumbnail/references/small/{{$ref->image}}" alt="{{$ref->name}}" title="{{$ref->name}}"/>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CLIENT LOGO -->

    </div>
    <!-- END MAIN CONTENT -->



@endsection



@section('css')

@endsection




@section('js')

@endsection
