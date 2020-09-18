@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <img class="invoice-title" height="50px" src="/uploads/setting/{{$setting->logo}}" alt="">
                            <div class="billed-from">
                                <h6>BaskıMedya Sipariş Detayları</h6>
                                <p></p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600"></label>
                                <div class="billed-to">
                                    <h6>{{  $user->name .' '.$user->surname}}</h6>
                                    <p>{{$user->address1}}<br>
                                        {{$user->address2}}<br><br>
                                        Tc-Kimlik: {{$user->tckimlik}}<br><br>
                                        Tel No: {{$user->gsm}}<br>
                                        {{$user->gsm2}}<br>
                                        Email: {{$user->email}}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">Sipariş Bilgileri</label>
                                <p class="invoice-info-row"><span>Sipariş İd</span>
                                    <span>{{$order->merchant_oid}}</span></p>
                                <p class="invoice-info-row"><span> İndirme Linki</span> <a
                                        class="btn btn-primary  btn-sm " href="{{$order->filesurl}}"
                                        target="_blank"><span class="text-white"><i class="fa fa-mouse-pointer"> </i> İndirme adresine git</span></a>
                                </p>
                                <p class="invoice-info-row"><span> İndirme Link adresi </span> {{$order->filesurl}} </p>
                                <p class="invoice-info-row"><span>Sipariş Tarihi:</span>
                                    <span>{{$order->created_at}}</span></p>
                                {{--                                <p class="invoice-info-row"><span>Due Date:</span> <span>{{$order->updated_at}}</span></p>--}}
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            @if(isset($basketdata))
                                <table class="table   table-bordered  ">
                                    <thead class="text-muted">
                                    <tr>
                                        <th scope="col" width="">Ürün Bilgileri</th>
                                        <th scope="col" width="100">Fiyatı</th>
                                        <th scope="col" width="120">Ürün <br/> Sayı</th>
                                        <th scope="col" width="100">Toplam Fiyat</th>
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
                                                                        <td class="text-nowrap">{{number_format( $squaremeter->width,2)}}
                                                                            cm
                                                                        </td>
                                                                        <td class="text-nowrap">{{number_format( $squaremeter->height,2)}}
                                                                            cm
                                                                        </td>
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

                                                                    }else{
                                                                      $price = $basketproduct->product->price ;
                                                                    }
                                                            @endphp
                                                            <td><strong class=" border-bottom border-dark">Ürün TL
                                                                    fiyatı</strong> </br>
                                                                <p>{{ number_format(($price *$squaremeter->total)*$currency,2) }}
                                                                    <sup>₺</sup></p></td>
                                                        </tr>
                                                    @endif
                                                    @if($basketproduct->additional_options != Null)
                                                        @php $additional_options = json_decode($basketproduct->additional_options);@endphp
                                                        @foreach( $additional_options as $option)
                                                            <tr>
                                                                <th class="compress text-nowrap">{{ (new \App\AdditionalOption())->optionROW($option)->parent->name }}</th>
                                                                <td>{{ (new \App\AdditionalOption())->optionROW($option)->name }}</td>
                                                                <td class="text-monospace text-right">{{ number_format( (new \App\AdditionalOption())->optionROW($option)->price*$currency,2) }}
                                                                    <sup>₺</sup></td>
                                                            </tr>
                                                        @endforeach

                                                    @endif
                                                    </tbody>

                                                </table>
                                                <span
                                                    class=" text-monospace mt-1  text-sm-left">Ürün Sipariş Kodunuz  - {{$basketproduct->product->product_code}} @if($basketproduct->option_id != Null){{$basketproduct->option->option_code}} @endif</span>
                                            </td>
                                            <td> {{number_format($basketproduct->price*$currency , 2)}} <sup> ₺</sup>
                                            </td>
                                            <td>
                                                {{--                                        <input type="number" name="" id="{{$basketproduct->id}}"--}}
                                                {{--                                               data-qty="{{$basketproduct->quantity}}"--}}
                                                {{--                                               onchange="hesapla({{$basketproduct->id}},{{$basketproduct->quantity}});"--}}
                                                {{--                                               data-json="{{$gelenJSON = json_encode($basketdata)}}"--}}
                                                {{--                                               value="{{$adet = $basketproduct->quantity}}" class="adet form-control">--}}
                                                <h4 class="text-center"><span class="adet  badge badge-secondary "
                                                                              data-json="{{$gelenJSON = json_encode($basketdata)}}">{{$adet = $basketproduct->quantity}}</span>
                                                </h4>
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                    {{--                                            {{ $priceproduct= number_format(($basketproduct->price*$basketproduct->quantity)*$currency->deger , 2 )}}--}}
                                                    <var
                                                        class="price"> {{ $priceproduct = number_format(($basketproduct->price*$basketproduct->quantity)*$currency, 2 )}}</var><sup>
                                                        ₺</sup>
                                                    {{--                                            @php $totalPrice += $priceproduct;@endphp--}}
                                                </div> <!-- price-wrap .// -->
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>


                                    <tfoot>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td class="text-nowrap text-right">Toplam</td>
                                        <td class="text-nowrap text-monospace text-right toplamFiyat">{{$order->totalPrice}}
                                            TL
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td class="text-nowrap text-right">KDV %18</td>
                                        <td class="text-nowrap text-monospace text-right kdv">{{ $yuzde=number_format(($order->totalPrice/100)*18 , 2)}}
                                            TL
                                        </td>
                                    </tr>
                                    <tr class="bg-success text-white">
                                        <td colspan="2"></td>
                                        <td class="text-nowrap font-weight-bold text-right"> Ödenecek Miktar</td>
                                        <td class="text-nowrap text-monospace text-right odenecek">{{number_format($order->totalPrice+$yuzde ,2)}}
                                            TL
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            @else
                                <h1>Sepete eklenen urununuz bulunmamaktadir</h1>
                            @endif
                        </div>
                        <hr class="">
                        @if($order->order_completed == 0 ||$order->order_completed == -1 )
                            <a href="{{route('orderconfirm',[$order->id,'onayla'])}}" class="btn btn-success float-right mt-3 ml-2">
                                <i class="mdi mdi-check mr-1"></i>Siparişi Onayla
                            </a>
                        @endif
                        @if($order->order_completed == 1  )
                            <a href="{{route('orderconfirm',[$order->id,'iptal-et'])}}" class="btn btn-purple float-right mt-3 ml-2" >
                                <i class="mdi mdi-check-all mr-1"></i> Baskısı Bitti
                            </a>
                        @endif
                        @if($order->order_completed == 0 ||$order->order_completed == 1 )
                            <a href="{{route('orderconfirm',[$order->id,'baski-bitti'])}}" class="btn btn-danger float-right mt-3 ml-2">
                                <i class="mdi mdi-close-circle-outline mr-1"></i>İptal Et
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
@endsection


@section('js')
@endsection
