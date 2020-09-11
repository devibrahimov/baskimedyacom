@extends('Site.index')

@section('meta')
    @php
        $meta = json_decode($product->meta);
    @endphp

    <meta name="title" content="{{$meta->title}}">
    <meta name="description" content=" {{$meta->description}} ">
@endsection

@section('content')
    @include('Site.partials.bread')
    <style>
        .table td, .table th {
            padding: 0.20rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        tr.selected {
            background: #00b4ff;
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
                                @if($product->price != NULL)
                                    <div class="product_price">
                                        <span class="price">{{$product->price}}</span>
                                    </div>
                                @endif

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
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row allContent">
                    <div class="col-lg-6">
                        {{--   <p>Seçenekler</p>--}}
                        @if($product->parent_option != NULL)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="5%" scope="col">#</th>
                                    <th width="65%" scope="col">Ürün <br> Malzemesi</th>
                                    <th width="15%" scope="col">Stok <br/> Durumu</th>
                                    <th width="25%" scope="col">m <sup>2</sup> <br/>fiyatı</th>
                                </tr>
                                </thead>
                                <tbody class="product-options tr">

                                @foreach($product->options($product->parent_option) as $option)
                                    <tr class="@if($loop->first) {{'selected'}} @endif ">
                                        <th scope="row">
                                            <div class="custome-checkbox" name="myForm">

                                                <input class="form-radio-input option" type="radio" name="radios"
                                                       data-option="{{$option->id}}"
                                                       @if($loop->first) {{'checked'}} @endif data-optioncode="{{$option->option_code}}"
                                                       data-optionprice="{{$option->price}}"
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
                        @endif
                    </div>
                    <div class="otherOptions col-lg-6">
                        @if($product->hasmeter == 1)
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
                                                    <input class="form-control vinilWidth" type="number" min="1"
                                                           step="1"
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
                                        <th>En (cm)</th>
                                        <th>Boy (cm)</th>
                                        <th>Alan (m<sup>2</sup>)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><span id="calc-w">100</span></td>
                                        <td><span id="calc-h">100</span></td>
                                        <td><span id="calc-area">1.00 </span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                        @endif



                        @if($product->additional_options != NULL)
                            <p>Ek Seçenekler</p>
                            @foreach( $product->additionaloptionsparent($product->additional_options) as $options)
                                @foreach($options as $key => $option)
                                    <div class="input-group mb-3 additionaloptions">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text bg_default text-white "
                                                   for="inputGroupSelect01">{{$option->name}}</label>
                                        </div>

                                        <select class="custom-select additionaloption" id="inputGroupSelect01">

                                            @foreach($product->additionaloption($option->id)  as $opt)
                                                <option name="veri" value="{{$opt->id}}"
                                                        data-price="{{$opt->price}}">{{$opt->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                @endforeach
                            @endforeach
                        @endif


                        <div class="pr_detail">
                            <div class="product_description">
                                <div class="pr_detail">
                                    <div class="product_description">
                                        <br>
                                        <ul class="product-meta d-inline">
                                            <li class="text-default">Sipariş Kodu: <a
                                                    href="#"> {{$product->product_code}}<span
                                                        id="siparisCode">{{isset($option->product_code)?'-'.$option->product_code:''}}</span></a>
                                            </li>
                                            <li class="text-default">Toplam Fiyat : $ <a
                                                    {{--                                                    @dd($product->options($product->parent_option)[0]->price);--}}
                                                    class="tutar">{{$product->price ? $product->price : $product->options($product->parent_option)[0]->price}}</a>
                                            </li>
                                        </ul>
                                        <hr/>
                                    </div>
                                </div>

                            </div>

                        </div>


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

        $(document).ready(function () {

            var isMeter = {{$product->hasmeter}};
            var isParentOption = {{$product->parent_option ? $product->parent_option :  null}}
            console.log(isParentOption);
            var urunFiyat = {{$product->price ? $product->price : $product->options($product->parent_option)[0]->price}};

            console.log(isMeter, '##########################', isParentOption, urunFiyat);

            var $featureSelect = $('.allContent');
            var $productFeatureSelect = $('.option');
            var $price = $('#price');
            var $priceShow = $('.tutar');
            var $addToCartBtn = $('.btn-addtocart');
            var $quantityInput = $('.qty');
            var $width = $('#width');
            var $height = $('#height');
            var $calcW = $('#calc-w');
            var $calcH = $('#calc-h');
            var $calcArea = $('#calc-area');
            var $featurePrice = $('.option:checked')[0] == undefined ? null : $('.option:checked')[0].dataset.optionprice;
            var toplamfiyat = 0;
            var fiyat = 0;
            var $additionalOption = $('.additionaloption option:selected');
            var $radioButton = $('.product-options tr');
            var quantitiy = $quantityInput.val();
            var w;
            var h;
            var area = (w * h).toFixed(2);
            console.log(fiyat, toplamfiyat, '#######################################')

            $featureSelect.on('click change keyup', function () {
                if (isMeter == 0 && isParentOption != null) {
                    radiooptionprice()
                    eksecenekler()
                    getQuantity()
                    calculateTotal()
                } else if (isMeter != 0 && isParentOption != null) {
                    radiooptionprice()
                    eksecenekler()
                    getQuantity()
                    metreKare()
                    calculateTotal()
                }else if (isMeter == 0 && isParentOption == undefined){
                    eksecenekler()
                    calculateTotal()
                }
            });

            // TOPLAM FIYAT

            var calculateTotal = function () {
                if (isMeter == 0 && isParentOption != null) {
                    console.log('###### girmeden önceki fiyatı',toplamfiyat);
                    toplamfiyat = ((parseFloat($featurePrice) + parseFloat(eksecenekFiyati))).toFixed(2);
                    toplamfiyat = urunFiyat + Number(toplamfiyat);
                    console.log(typeof(urunFiyat),typeof (toplamfiyat))
                    toplamfiyat = toplamfiyat * quantitiy;
                    $priceShow.text(toplamfiyat);
                    console.log('$$$$$$$$$$$$$$$$$$$$$$$$$$$$')
                } else if (isMeter == 1 && isParentOption != null) {
                    console.log("giriyopr")
                    toplamfiyat = ((parseFloat($featurePrice) + parseFloat(eksecenekFiyati)) * parseInt(quantitiy))
                    console.log('############ ALAN ++++++++++++', area);
                    toplamfiyat = toplamfiyat * area;
                    console.log(toplamfiyat,area,"OLLLDUUU LAANNNNNNNNNNN")
                    $priceShow.text(toplamfiyat);
                } else if (isMeter == 0 && isParentOption == null){
                    toplamfiyat = parseFloat(eksecenekFiyati) * parseInt(quantitiy);
                    toplamfiyat = urunFiyat + Number(toplamfiyat);
                    toplamfiyat = toplamfiyat * $quantityInput.val();
                    console.log($quantityInput.val())
                    console.log(toplamfiyat,"FİYAAAT")
                    $priceShow.text(toplamfiyat);
                }

            }

            //METRE KARE
            var getWidthM = function () {
                return parseFloat(parseInt($width.val()) / 100);
            };

            var getHeightM = function () {
                return parseFloat(parseInt($height.val()) / 100);
            };

            var metreKare = function () {
                w = getWidthM();
                h = getHeightM();
                area = (w * h).toFixed(2);
                $calcW.text(parseFloat($width.val()));
                $calcH.text(parseFloat($height.val()));
                parseFloat(area).toFixed(2);
                $calcArea.text(area);
                return area;
                console.log(area)
            }

            // ADET
            var getQuantity = function () {
                quantitiy = $quantityInput.val();
                console.log('########## ADET ######', quantitiy);
            }


            var $featureId = $('.option:checked');
            var optioncode = $featureId[0] == undefined ? null : $featureId[0].dataset.optioncode;
            document.getElementById('siparisCode').innerHTML = optioncode;


            // EK SEÇENEKLER
            var eksecenekFiyati;
            var eksecenekler = function () {
                $additionalOption.each(function (i, elm) {
                    $additionalOption = $('.additionaloption option:selected');
                    eksecenekFiyati = $(elm).data("price");
                    return parseFloat(eksecenekFiyati);
                });
            }

            // RADIO BUTTON
            // $radioButton.on('click change', function () {
            //     radiooptioncode()
            //     $featurePrice = $('.option:checked')[0].dataset.optionprice;
            // })

            var radiooptionprice = function () {
                $radioButton.on('click change', function () {
                    $featurePrice = $('.option:checked')[0].dataset.optionprice;
                    console.log('#### RADIOLAR #### ', optioncode, $featurePrice)
                    return parseFloat($featurePrice);
                });
            }


            $('.product-options tr').click(function () {
                $(this).children('th').children('div').children('input').prop('checked', true);
                $('.product-options tr').removeClass('selected');
                $(this).toggleClass('selected');

                //URUN KODLARI
                $featureId = $('.option:checked');
                optioncode = $featureId[0].dataset.optioncode
                document.getElementById('siparisCode').innerHTML = optioncode;
            });

            //--------------------------------------------
        });


        $('#addBasket').on('click', function () {
            @if($product->parent_option != null )
            var optionid =  ($('.option:checked')[0].dataset.option)
            @endif

            @if($product->hasmeter != null )
            var vinilWidth = $('.vinilWidth').val()
            var vinilHeight = $('.vinilHeight').val()
            @endif

            var qty = $('.qty').val()

            //    console.log(qty)

            var additionaloption = new Array()
            for (var i = 0; i < $('.additionaloption').length; i++) {
                additionaloption.push($('.additionaloption')[i].value)
            }
            // console.log(additionaloption)
            var loggedIn = {{{(Auth::user())? 'true' : 'false' }}} ;
            if (!loggedIn) {
                alert('Sepete Ekleyebilmeniz için Kullanıcı olarak giriş yapmanız gerekmektedir');
            } else {
                $.ajax({ /* AJAX REQUEST */
                    type: 'post',
                    url: "{{route('product.addtocart')}}",
                    data: {
                        'user_id': AuthUser,
                        'product_id': {{$product->id}},
                        'additionaloptions': additionaloption,
                         @if($product->parent_option != null )
                        'optionid': optionid,
                        @else
                        'price':{{$product->price}} ,
                         @endif
                        @if($product->hasmeter != null )
                        'height': vinilHeight,
                        'width': vinilWidth,
                        @endif
                        'qty': qty,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        $.ajax({
                            method: 'GET',
                            url: "/kullanici/basket/get/" + AuthUser,

                            success: function (data) {
                                $('#cartproducts').html(data.products)
                                $('#cart_count').html(data.count)
                            }
                        })
                    }
                });
            }
        });

    </script>

@endsection
