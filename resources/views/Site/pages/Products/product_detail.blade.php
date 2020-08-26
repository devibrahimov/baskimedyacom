@extends('Site.index')

@section('content')
    @include('Site.partials.bread')
    <style>
        .table td, .table th {
            padding: 0.20rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                <img id="product_img"
                                     src='/storage/uploads/thumbnail/products/large/{{$product->image}}'
                                     data-zoom-image="/storage/uploads/thumbnail/products/large/{{$product->image}}"
                                     alt="product_img1"/>
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                                 data-slides-to-scroll="1" data-infinite="false">
                                <div class="item">
                                    <a href="#" class="product_gallery_item active"
                                       data-image="/storage/uploads/thumbnail/products/large/{{$product->image}}"
                                       data-zoom-image="/storage/uploads/thumbnail/products/large/{{$product->image}}">
                                        <img src="/storage/uploads/thumbnail/products/large/{{$product->image}}"
                                             alt="product_small_img1"/>
                                    </a>
                                </div>
                                @foreach($images as $img)
                                    <div class="item">
                                        <a href="#" class="product_gallery_item "
                                           data-image="/storage/uploads/thumbnail/products/large/{{$img->name}}"
                                           data-zoom-image="/storage/uploads/thumbnail/products/large/{{$img->name}}">
                                            <img src="/storage/uploads/thumbnail/products/small/{{$img->name}}"
                                                 alt="product_small_img1"/>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <br>

                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                {{--                                @dd($product);--}}
                                <h4 class="product_title"><a href="#">{{$product->name}}</a></h4>
                                <div class="product_price">
                                    <span class="price">${{$product->price}}</span>
                                    <del>$55.25</del>

                                </div>

                                <br>
                                <hr>

                                <div class="pr_detail">
                                    <div class="product_description">
                                        <div class="pr_desc">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <br>
                                        <ul class="product-meta d-inline">
                                            <li class="text-default">Ürün Adı: <a
                                                    href="{{route('showProducts',[$product->id,$product->slug])}}"> {{$product->name}}</a>
                                            </li>
                                            <li class="text-default">Kategori: <a
                                                    href="#"> {{ $product->categoryName->name}} </a></li>
                                            <li class="text-default">Ürün kodu: <a
                                                    href="{{route('showProducts',[$product->id,$product->slug])}}"> {{$product->product_code}}</a>
                                            </li>

                                        </ul>
                                        <hr/>
                                        <div class="product_share">
                                            <span>Paylaş:</span>
                                            <ul class="social_icons">
                                                <li><a href="#"><i class="ion-social-facebook text-info"> </i> facebook
                                                    </a></li>
                                            </ul>
                                            <ul class="product-meta d-inline">
                                                <li class="text-default">Ürün Sipariş Kodu : <a
                                                        href="{{route('showProducts',[$product->id,$product->slug])}}"> {{$product->product_code}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        {{--                        <p>Seçenekler</p>--}}

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="5%" scope="col">#</th>
                                <th width="75%" scope="col">Ürün <br> Malzemesi</th>
                                <th width="15%" scope="col">Stok <br/> Durumu</th>
                                <th width="15%" scope="col">m <sup>2</sup> <br/>fiyatı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->options($product->parent_option) as $option)
                                <tr>
                                    <th scope="row">
                                        <div class="custome-checkbox" name="myForm">

                                            <input class="form-radio-input option" type="radio" name="radios"
                                                   data-option="{{$option->id}}"
                                                   @if($loop->first) {{'checked'}} @endif data-optionprice="{{$option->price}}"
                                                   id="exampleRadio3" value="{{$option->id}}">
                                            <label class="form-radio-label" for="exampleRadio3"> </label>
                                        </div>
                                    </th>
                                    <td>{{$option->name}}</td>
                                    <td>@if($option->stock == 1) {{'var'}} @endif</td>
                                    <td>$ {{$option->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="otherOptions col-lg-6">

                        <div id="dimensions" class="card shadow-sm mb-4 ">
                            <div class="card-header bg_default text-white">
                                <h6 class="mb-0 font-weight-bold text-white">Ölçüler</h6>
                            </div>
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-6 ">
                                        <div class="form-group mb-0 metreKare">
                                            <label for="width" class="sr-only ">En</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span
                                                        class="input-group-text bg_default text-white font-weight-bold">EN</span>
                                                </div>
                                                <input class="form-control vinilWidth" type="number" min="1" step="1"
                                                       id="width" name="width"
                                                       value="100">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg_default text-white ">sm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 ">
                                        <div class="form-group mb-0 metreKare">
                                            <label for="height" class="sr-only">Boy</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span
                                                        class="input-group-text font-weight-bold bg_default text-white ">BOY</span>
                                                </div>
                                                <input type="number" min="1" step="1" id="height" name="height"
                                                       value="100" class="form-control vinilHeight">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg_default text-white ">sm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-sm table-hover mb-0 font-sm text-center">
                                <thead>
                                <tr>
                                    <th class="compress"></th>
                                    <th>En (cm)</th>
                                    <th>Boy (cm)</th>
                                    <th>Alan (m<sup>2</sup>)</th>
                                    <th>Çevre (m)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="text-right">Birim</th>
                                    <td><span id="calc-w">100</span></td>
                                    <td><span id="calc-h">100</span></td>
                                    <td><span id="calc-area">1.0000</span></td>
                                    <td><span id="calc-perimeter">4.0000</span></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <hr>


                        @if($product->additional_options != NULL)
                            <p>Ek Seçenekler</p>
                            @foreach( $product->additionaloptionsparent($product->additional_options) as $options)
                                @foreach($options as $key => $option)
                                    <div class="input-group mb-3 additionaloptions">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text bg_default text-white "
                                                   for="inputGroupSelect01">{{$option->name}}</label>
                                        </div>

                                        <select class="custom-select additionaloption" id="inputGroupSelect01"  >
                                            <option value="0"> -----</option>
                                            @foreach($product->additionaloption($option->id)  as $opt)
                                                <option name="veri" value="{{$opt->id}}">{{$opt->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                @endforeach
                            @endforeach
                        @endif


                        <div class="cart_extra mt-2">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>

                            <div class="cart_btn">
                                <a>
                                    <button class="btn btn-fill-out btn-addtocart" type="submit" id="addBasket"><i
                                            class="icon-basket-loaded"></i> Sepete Ekle
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <!-- END SECTION SHOP -->

        @include('Site.partials.subscribe')
    </div>
    <!-- END MAIN CONTENT -->


@endsection

@section('js')
    <script>

        var AuthUser = "{{{ (Auth::user()) ? \Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id) : null }}}";
        $('#addBasket').on('click', function () {
            var optionid = ($('.option:checked')[0].dataset.option)
            var vinilWidth = $('.vinilWidth').val()
            var vinilHeight = $('.vinilHeight').val()

            var qty = $('.qty').val()
        //    console.log(qty)

            var additionaloption = new Array()
            for (var i = 0; i < $('.additionaloption').length; i++) {
                additionaloption.push($('.additionaloption')[i].value)
            }
           // console.log(additionaloption)
            var loggedIn = {{{(Auth::user())? 'true' : 'false' }}} ;
            if (!loggedIn){
                alert('Sebete Ekleye bilmeniz için Kullanıcı olarak giriş yapmanız gerekmektedir');
            }else{
                $.ajax({ /* AJAX REQUEST */
                    type: 'post',
                    url: "{{route('product.addtocart')}}",
                    data: {
                        'user_id':AuthUser,
                        'product_id' : {{$product->id}},
                        'optionid':optionid,
                        'additionaloptions':additionaloption,
                        'height': vinilHeight,
                        'width': vinilWidth,
                        'qty':qty,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        return this.data
                    }
                });
            }



        });

    </script>

@endsection
