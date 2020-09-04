@extends('Site.index')


@section('meta')

    <meta name="title" content=" ">
    <meta name="description" content="  ">

@endsection




@section('content')

  @include('Site.partials.bread')

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
                                                <span class="price">$ {{$product->optionchipoption($product->parent_option)->price}}</span>

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
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <div class="section bg_default small_pt small_pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>Bültenimize Ücretsiz Abone Olun!</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form>
                            <input type="text" required="" class="form-control rounded-0" placeholder="E-Posta Adresinizi Giriniz">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Abone Ol</button>
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
