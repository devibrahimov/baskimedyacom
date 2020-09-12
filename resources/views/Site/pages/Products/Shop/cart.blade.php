<?php use App\AdditionalOption; ?>
@extends('Site.index')


@section('css')
    .param {
    margin-bottom: 7px;
    line-height: 1.4;
    }
    .param-inline dt {
    display: inline-block;
    }
    .param dt {
    margin: 0;
    margin-right: 7px;
    font-weight: 600;
    }
    .param-inline dd {
    vertical-align: baseline;
    display: inline-block;
    }

    .param dd {
    margin: 0;
    vertical-align: baseline;
    }

    .shopping-cart-wrap .price {
    color: #007bff;
    font-size: 18px;
    font-weight: bold;
    margin-right: 5px;
    display: block;
    }
    var {
    font-style: normal;
    }

    .media img {
    margin-right: 1rem;
    }
    .img-sm {
    width: 90px;
    max-height: 75px;
    object-fit: cover;
    }
@endsection


@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <table class="table   table-bordered shopping-cart-wrap">
                            <thead class="text-muted">
                            <tr>
                                <th scope="col" width="">Ürün Bilgileri</th>
                                <th scope="col" width="100">Fiyatı</th>
                                <th scope="col" width="120">Ürün <br/> Sayı</th>
                                <th scope="col" width="100">Toplam Fiyat</th>
                                <th scope="col" width="120" class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $totalPrice = 0; @endphp
                            @foreach($basketdata as $basketproduct)
                                <tr id="{{$basketproduct->id}}" style="border-bottom: 1px solid red">
                                    <td>
                                        <table class="table table-sm font-sm mb-0 mt-2">
                                            <tbody>
                                            <tr>
                                                <th class="compress text-nowrap">{{$basketproduct->product->name}} </th>
                                                <td colspan="2">
                                                    @if($basketproduct->option_id != Null)
                                                        {{$basketproduct->option->name}}
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($basketproduct->square_meter != Null)
                                                <tr>
                                                    <th>Ölçüler</th>
                                                    <td class="p-0">
                                                        <table class="table table-sm mb-0 font-sm text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>En</th>
                                                                <th>Boy</th>
                                                                <th>Alan</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <?php $squaremeter = json_decode($basketproduct->square_meter);?>
                                                                <td class="text-nowrap">{{$squaremeter->width}} cm</td>
                                                                <td class="text-nowrap">{{$squaremeter->height}} cm</td>
                                                                <td class="text-nowrap">
                                                                    <span class="text-muted"><strong> {{$squaremeter->total}}m<sup>2</sup></strong>  </span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    @php
                                                        if ($basketproduct->option_id !=Null){
                                                                $price = $basketproduct->option->price ;
                                                                echo '$$$$$$$$$$$$';
                                                            }else{
                                                              $price = $basketproduct->product->price ;
                                                            }
                                                    @endphp
                                                    <td><strong class=" border-bottom border-dark">Ürün TL
                                                            fiyatı</strong> </br>
                                                        <p>{{ number_format(($price *$squaremeter->total)*$currency->deger,2) }}
                                                            <sup>₺</sup></p></td>
                                                </tr>
                                            @endif
                                            @if($basketproduct->additional_options != Null)
                                                @php $additional_options = json_decode($basketproduct->additional_options);@endphp
                                                @foreach( $additional_options as $option)
                                                    <tr>
                                                        <th class="compress text-nowrap">{{ (new \App\AdditionalOption())->optionROW($option)->parent->name }}</th>
                                                        <td>{{ (new \App\AdditionalOption())->optionROW($option)->name }}</td>
                                                        <td class="text-monospace text-right">{{ number_format( (new \App\AdditionalOption())->optionROW($option)->price*$currency->deger,2) }}
                                                            <sup>₺</sup></td>
                                                    </tr>
                                                @endforeach

                                            @endif
                                            </tbody>

                                        </table>
                                        <span
                                            class=" text-monospace mt-1  text-sm-left">Ürün Sipariş Kodunuz  - {{$basketproduct->product->product_code}} @if($basketproduct->option_id != Null){{$basketproduct->option->option_code}} @endif</span>
                                    </td>
                                    <td> {{number_format($basketproduct->price*$currency->deger , 2)}} <sup>₺</sup></td>
                                    <td>
                                        <input type="number" name="" id="{{$basketproduct->id}}"
                                               data-qty="{{$basketproduct->quantity}}"
                                               onchange="hesapla({{$basketproduct->id}});"
                                               value="{{$basketproduct->quantity}}" class="adet form-control">
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            {{--                                            {{ $priceproduct= number_format(($basketproduct->price*$basketproduct->quantity)*$currency->deger , 2 )}}--}}
                                            <var
                                                class="price"> {{ $priceproduct = number_format(($basketproduct->price*$basketproduct->quantity)*$currency->deger , 2 )}}</var><sup>₺</sup>
                                            {{--                                            @php $totalPrice += $priceproduct;@endphp--}}
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right  ">
                                        <a onclick="removecartitem({{$basketproduct->id}})"
                                           class="btn btn-sm btn-outline-danger item_remove"> × Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                            <tfoot>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td class="text-nowrap text-right">Toplam</td>
                                <td class="text-nowrap text-monospace text-right toplamFiyat">{{$totalPrice}} TL</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td class="text-nowrap text-right">KDV %18</td>
                                <td class="text-nowrap text-monospace text-right kdv">{{ $yuzde=number_format(($totalPrice/100)*18 , 2)}}
                                    TL
                                </td>
                            </tr>
                            <tr class="bg-success text-white">
                                <td colspan="3"></td>
                                <td class="text-nowrap font-weight-bold text-right"> Ödenecek Miktar</td>
                                <td class="text-nowrap text-monospace text-right odenecek">{{number_format($totalPrice+$yuzde ,2)}}
                                    TL
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div> <!-- card.// -->
                </div>
            </div>


        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="heading_s1 mb-3">
                        <h6> Dosya İndirme Adresi </h6>
                    </div>

                    <form action="{{route('filesurl')}}" method="POST" class="field_form shipping_calculator">
                        <div class="form-row">
                            <div class="form-group col-lg-9">
                                <input required="required" class="form-control" name="filesurl" type="url">
                            </div>
                            @csrf
                            <input type="hidden" name="basketid" value="{{$basketproduct->basket_id}}">

                            <input type="hidden" name="uid"
                                   value="{{ \Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id)}}">
                            <div class="form-group col-lg-3">
                                <input type="submit" value="Ödeme Sayfasına Geç" class="btn btn-danger">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>


    @if ($errors->any())
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
                                            <h4>Hata Mesajı</h4>
                                        </div>
                                        @foreach ($errors->all() as $error)
                                            <p>
                                                {{ $error }}
                                            </p><br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')
    <script>




        var $sagAltToplam = $('.toplamFiyat');
        $sagAltToplam.text("65465465465")

        //GELEN TABLONUN ID'SINI ALIYORUM
        function hesapla (id){
            // GELEN ID İLE TABLOYU SEÇİYORUM
            $tablo = $('#'+id);
            console.log($tablo,'bbbbbbbbbbbbb')

            // GELEN UNIQUE ID FİYATINI ALIYORUM
            var urunFiyat = Number($tablo[0].childNodes[3].childNodes[0].data)
            // ADETİNİ ALYIORUM
            var urunAdet = $tablo[0].childNodes[5].childNodes[1].valueAsNumber
            // console.log("Fiyat :",urunFiyat,"urunAdet : ", urunAdet)
            // YİNE FİYAT ALIYORUM AMA O KADAR KAFAM KARISTI KI BU HANGİ FİYAT BİMİYORUM
            var $urunPrice = $tablo[0].childNodes[7].childNodes[1].childNodes[1];
            // ADET VE URUN FİYAT ÇARPIMI SONUCU TOPLAM
            var urunToplam = urunFiyat * urunAdet;
            console.log("URUN FİYAT : ",urunToplam,urunAdet,urunFiyat);
            console.log("IDDDDDDDDDDDDDDDD: ",id)
            // JQUERY ADET CLASS ELEMENTI
            var $adet = $('.adet');
            // UNIQUE ADET ELEMENTİ HER ADET FARKLI OLABİLİR DİYE
            var adet = $tablo[0].childNodes[5].childNodes[1].valueAsNumber
            // HER TOPLAM FARKLI OLABİLİR
            var $toplam = $tablo[0].children[3].children[0].children[0].innerText;

            // GENEL TOPLAM KDV FALAN FİLAN TOPLANDIĞININ GÖSTERİLDİĞİ ELEMENT
            var $odenecek = $('.odenecek');
            var buldummu;

            {{--var $table = $('{{$basketproduct->id}}');--}}
                $totalPrice = urunToplam;
            // $toplam = $('.toplamFiyat');
            // TOPLAM FİYATI ATIYORUM
            $toplam = $totalPrice.toFixed(2);
            // KDV HESABI
            kdvPrice = ($totalPrice / 100) * 18;
            $kdvToplam = $('.kdv');

            $kdvToplam.text(kdvPrice.toFixed(2));

            $urunPrice = (urunToplam.toFixed(2));

            $odenecekToplam = kdvPrice + $totalPrice;
            $odenecek.text($odenecekToplam.toFixed(2));

            // ON CHANGE'TE DE HER DEGİSTİĞİNDE YUKARIDA BULUNAN GLOBAL DEGİSKENLERE ATAMA YAPILIYOR
            // BURADAKİ SORUN HER GELEN AYRI TOPLAMLARIN ON CHANGE OLDUĞUNDA SAĞ ALTTAKİ TOPLAMDA BİRİKTİRİLEMEMESİ
            {{--// YUKARIDAN {{totalprice kullanılarak global bir toplam degiskeni olusturulabilir kanaatindeiym}}}}--}}
                // console.log'lar yardımcınız olsun iyi geceler koçlarım
            $adet.on('change', function ($tablo) {
                var toplatop = 0;
                //console.log($tablo)
                adet = $tablo.originalEvent.path[2].childNodes[5].children[0].valueAsNumber;
                $toplam = $($tablo.originalEvent.path[2].childNodes[7].children[0].children[0]);

                // SAĞ ALT TOPLAM
                $noluyo = $($tablo.originalEvent.path[4].children[2].children[0].children[2]);
                // console.log($noluyo,"noluyooooooooooooooooooooooooooooooooooo")

                urunToplam = urunFiyat * adet;
                $toplam.text( urunToplam.toFixed(2));

                toplatop = toplatop + urunToplam;
                var buldummu = toplatop;
                    buldummu = toplatop + buldummu;
                // console.log("TOPLA TOPPPP: ",Number(buldummu))


                $genelToplam = $($tablo.originalEvent.path[4].children[2].children[0].children[2]);
                $genelToplam.text(toplatop.toFixed())
                kdvPrice = ($totalPrice / 100) * 18;
                $kdvToplam = $('.kdv');
                $kdvToplam.text(kdvPrice.toFixed(2));
                $odenecekToplam = kdvPrice + $totalPrice;
                $odenecek.text($odenecekToplam.toFixed(2));
            })

        }


        {{--$(document).ready(function () {--}}

        {{--    $tablo = $('#{{$basketproduct->id}}');--}}
        {{--    console.log($tablo)--}}
        {{--    var urunFiyat = Number($tablo[0].childNodes[3].childNodes[0].data)--}}
        {{--    var urunAdet = $tablo[0].childNodes[5].childNodes[1].valueAsNumber--}}
        {{--    var $urunPrice = $('.price');--}}
        {{--    var urunToplam = urunFiyat * urunAdet;--}}
        {{--    $urunPrice.text(urunToplam.toFixed(2));--}}
        {{--});--}}


        {{--function quantityval(id) {--}}

        {{--    var qty = $(this).val();--}}
        {{--    --}}
        {{--    console.log(qty)--}}
        {{--    $.ajax({--}}
        {{--        method: 'POST',--}}
        {{--        url:" {{route('quantity.edit')}}",--}}
        {{--        data: {--}}
        {{--            'id': id,--}}
        {{--            'qty': qty,--}}
        {{--            '_token': "{{csrf_token()}}"--}}
        {{--        }, success: function (data) {--}}
        {{--        //    yeni sayiya uygu olarak fiyati guncelleyecek--}}
        {{--            console.log(data)--}}
        {{--        }--}}
        {{--    });--}}

        {{--}--}}

        function removecartitem(id) {
            var AuthUser = "{{{ (Auth::user()) ? \Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id) : null }}}";

            $.ajax({
                method: 'GET',
                url: "/kullanici/basket/remove/" + id,

                success: function (data) {

                    if (data == true) {
                        $.ajax({
                            method: 'GET',
                            url: "/kullanici/basket/get/" + AuthUser,

                            success: function (data) {
                                $('#' + id).remove();
                            }
                        })

                        //console.log(data);
                    } else {
                        console.log('silinmedi');
                    }

                }
            })

        }


    </script>
@endsection
