
@extends('Admin.index')
{{--@dd($comparetolastweek)--}}
@section('css')
@endsection


@section('content')
    <!-- row -->

    <div class="row row-sm justify-content-center">
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <a href="{{route('user.index')}}" >
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Kullanıcı Sayısı</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white"> {{$registeredusers[0]->registeredusers}} </h4>
                                    <p class="mb-0 tx-12 text-white op-7">Geçen Haftaya Göre Artış</p>
                                </div>
                                <span class="float-right my-auto ml-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> +{{$comparetolastweek[0]->comparetolastweek}}</span>
										</span>
                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">Toplam</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$totalproducts[0]->totalproducts}}</h4>
                                <p class="mb-0 tx-12 text-white op-7">Adet Ürün Bulunmaktadır</p>
                            </div>
                            <span class="float-right my-auto ml-auto">
											<span class="text-white op-7"> </span>
										</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">Toplam Siparişler</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white"> {{$totalorders[0]->totalorders}}</h4>
                                <p class="mb-0 tx-12 text-white op-7">Geçen Haftaya Göre Artış</p>
                            </div>
                            <span class="float-right my-auto ml-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7">+ {{$compareorder[0]->compareorder}}</span>
										</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card card-warning">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Kullanıcı :</h5>
                </div>
                <div class="card-body text-warning">
                    <h4>{{$performonsite["totalsForAllResults"]["ga:users"]}}</h4>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card card-warning">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Ortalama Oturum Süresi :</h5>
                </div>
                <div class="card-body text-warning">
                    <h4>{{number_format(($sessionsandduration["totalsForAllResults"]["ga:sessionDuration"]/3600),2)}} dk</h4>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card card-warning">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Oturum Sayısı :</h5>
                </div>
                <div class="card-body text-warning">
                    <h4>   {{$performonsite["totalsForAllResults"]["ga:sessions"]}}</h4>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card card-warning">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Hemen Çıkma Oranı :</h5>
                </div>
                <div class="card-body text-warning">
                    <h4> % {{number_format($performonsite["totalsForAllResults"]["ga:exitRate"],2)}}</h4>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->


    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">Haftalık Dolar Kuru</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
                <div class="list-group">
                @foreach($currencytoweek as $currency)
                    <div class="list-group-item border-top-0">
                        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                        <p>Dolar Kuru </p>
                        <span>${{$currency->deger}}</span>
                        <span>{{$currency->tarih}}</span>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1"> Yeni Sipariş Tablosu </h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">Bu günün onaylanmamış Yeni Siparişleri.</span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">Sipariş Kodu</th>
                            <th class="wd-lg-25p tx-right">Kullanıcı</th>
                            <th class="wd-lg-25p tx-right">Ödenen Meblağ</th>
                            <th class="wd-lg-25p tx-right">Sipariş Tarih/Saat</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach($newordertoday as $order)
                        <tr>
                            <td>{{isset($order->merchant_oid)?$order->merchant_oid :'' }}</td>
                            <td class="tx-right tx-medium tx-danger">{{isset($order->user->name)?$order->user->name:''}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{isset($order->totalPrice)?$order->totalPrice :'' }} TL</td>
                            <td class="tx-right tx-medium tx-inverse">{{isset($order->created_at)?$order->created_at :'' }}</td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- row close -->

@endsection


@section('js')
@endsection

