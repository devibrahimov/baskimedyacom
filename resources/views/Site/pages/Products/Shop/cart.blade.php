<?php use App\AdditionalOption; ?>
@extends('Site.index')



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
                            <tr id="{{$basketproduct->id}}">
                                <td>
                                    <table class="table table-sm font-sm mb-0 mt-2">
                                        <tbody>
                                        <tr>
                                            <th class="compress text-nowrap">{{$basketproduct->product->name}} </th>
                                            <td colspan="2">{{$basketproduct->option->name}}  </td>
                                        </tr>
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
                                                        <?php $squaremeter = json_decode($basketproduct->square_meter) ;?>
                                                        <td class="text-nowrap">{{$squaremeter->width}} cm</td>
                                                        <td class="text-nowrap">{{$squaremeter->height}} cm</td>
                                                        <td class="text-nowrap">

                                                            <span class="text-muted"><strong> {{$squaremeter->total}}m<sup>2</sup></strong>  </span>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td ><strong class=" border-bottom border-dark">Ürün TL fiyatı</strong> </br><p>{{ number_format(($basketproduct->option->price*$squaremeter->total)*$currency->deger,2) }} <sup>₺</sup></p> </td>
                                        </tr>

                               <?php $additional_options = json_decode($basketproduct->additional_options) ;?>
                                        @foreach( $additional_options as $option)
                                            <tr>
                                                <th class="compress text-nowrap">{{ (new \App\AdditionalOption())->optionROW($option)->parent->name }}</th>
                                                <td>{{ (new \App\AdditionalOption())->optionROW($option)->name }}</td>
                                                <td class="text-monospace text-right">{{ number_format( (new \App\AdditionalOption())->optionROW($option)->price*$currency->deger,2) }} <sup>₺</sup> </td>
                                            </tr>
                                        @endforeach


                                        </tbody>

                                    </table>
                                   <span class=" text-monospace mt-1  text-sm-left">Ürün Sipariş Kodunuz  - {{$basketproduct->product->product_code}}-{{$basketproduct->option->option_code}}</span>
                                </td>
                                <td > {{number_format($basketproduct->price*$currency->deger , 2)}} <sup>₺</sup></td>
                                <td>
                                    <input type="number" name="" onChange="quantityVal({{$basketproduct->id}});" id="" value="{{$basketproduct->quantity}}" class="form-control">
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price"> {{ $priceproduct= number_format(($basketproduct->price*$basketproduct->quantity)*$currency->deger , 2 )}}  </var><sup>₺</sup>
                                    @php $totalPrice+= $priceproduct;@endphp
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right  " >
                                     <a  onclick="removecartitem({{$basketproduct->id}})"    class="btn btn-sm btn-outline-danger item_remove"> × Sil</a>
                                </td>
                            </tr>
                          @endforeach
                            </tbody>




                            <tfoot>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td class="text-nowrap text-right">Toplam</td>
                                <td class="text-nowrap text-monospace text-right">{{$totalPrice}} TL</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td class="text-nowrap text-right">KDV %18</td>
                                <td class="text-nowrap text-monospace text-right">{{ $yuzde=number_format(($totalPrice/100)*18 , 2)}} TL</td>
                            </tr>
                            <tr class="bg-success text-white">
                                <td colspan="3"></td>
                                <td class="text-nowrap font-weight-bold text-right"> Ödenecek Miktar</td>
                                <td class="text-nowrap text-monospace text-right">{{number_format($totalPrice+$yuzde ,2)}} TL</td>
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
                <div class="col-md-6">
                    <div class="heading_s1 mb-3">
                        <h6> Dosya İndirme Adresi </h6>
                    </div>

                    <form class="field_form shipping_calculator">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input required="required" class="form-control" name="filesurl" type="text">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

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

@section('js')
    <script>

        function quantityVal(id){
            var AuthUser = "{{{ (Auth::user()) ? \Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id) : null }}}";

            var qty = $(this).val();

            $.ajax({
                method: 'POST',
                url: "/kullanici/basket/product/qty/edit/",

            });

        }

        function removecartitem(id){
            var AuthUser = "{{{ (Auth::user()) ? \Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id) : null }}}";

            $.ajax({
                method: 'GET',
                url: "/kullanici/basket/remove/" + id,

                success: function (data) {

                    if (data == true){
                        $.ajax({
                            method: 'GET',
                            url: "/kullanici/basket/get/" + AuthUser,

                            success: function (data){
                                $('#'+id).remove();
                            }
                        })

                        //console.log(data);
                    }else{
                        console.log('silinmedi');
                    }

                }
            })

        }


    </script>
@endsection
