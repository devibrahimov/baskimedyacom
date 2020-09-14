
@extends('Admin.index')
{{--@dd($comparetolastweek)--}}
@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm justify-content-center">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
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
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
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
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
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
{{--        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">--}}
{{--            <div class="card overflow-hidden sales-card bg-warning-gradient">--}}
{{--                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">--}}
{{--                    <div class="">--}}
{{--                        <h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6>--}}
{{--                    </div>--}}
{{--                    <div class="pb-0 mt-0">--}}
{{--                        <div class="d-flex">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="tx-20 font-weight-bold mb-1 text-white">$4,820.50</h4>--}}
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
{{--                            </div>--}}
{{--                            <span class="float-right my-auto ml-auto">--}}
{{--											<i class="fas fa-arrow-circle-down text-white"></i>--}}
{{--											<span class="text-white op-7"> -152.3</span>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--             </div>--}}
{{--        </div>--}}
    </div>
    <!-- row closed -->


    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
                <div class="list-group">
                    <div class="list-group-item border-top-0">
                        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                        <p>United States</p><span>$1,671.10</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                        <p>Netherlands</p><span>$1,064.75</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                        <p>United Kingdom</p><span>$1,055.98</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                        <p>Canada</p><span>$1,045.49</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                        <p>India</p><span>$1,930.12</span>
                    </div>
                    <div class="list-group-item border-bottom-0 mb-0">
                        <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                        <p>Australia</p><span>$1,042.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">Your Most Recent Earnings</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">Date</th>
                            <th class="wd-lg-25p tx-right">Sales Count</th>
                            <th class="wd-lg-25p tx-right">Earnings</th>
                            <th class="wd-lg-25p tx-right">Tax Witheld</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>05 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">$658.20</td>
                            <td class="tx-right tx-medium tx-danger">-$45.10</td>
                        </tr>
                        <tr>
                            <td>06 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">26</td>
                            <td class="tx-right tx-medium tx-inverse">$453.25</td>
                            <td class="tx-right tx-medium tx-danger">-$15.02</td>
                        </tr>
                        <tr>
                            <td>07 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">$653.12</td>
                            <td class="tx-right tx-medium tx-danger">-$13.45</td>
                        </tr>
                        <tr>
                            <td>08 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">45</td>
                            <td class="tx-right tx-medium tx-inverse">$546.47</td>
                            <td class="tx-right tx-medium tx-danger">-$24.22</td>
                        </tr>
                        <tr>
                            <td>09 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">31</td>
                            <td class="tx-right tx-medium tx-inverse">$425.72</td>
                            <td class="tx-right tx-medium tx-danger">-$25.01</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- row close -->
    <!-- row opened -->
    <div class="row row-sm row-deck">

        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Sales Activity</h3>
                    <p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
                </div>
                <div class="product-timeline card-body pt-2 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-right tx-11 text-muted">3 days ago</a>
                            <p class="mb-0 text-muted tx-12">1.3k New Products</p>
                        </li>
                        <li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-right tx-11 text-muted">35 mins ago</a>
                            <p class="mb-0 text-muted tx-12">1k New Sales</p>
                        </li>
                        <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-right tx-11 text-muted">50 mins ago</a>
                            <p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
                        </li>
                        <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-right tx-11 text-muted">1 hour ago</a>
                            <p class="mb-0 text-muted tx-12">3k New profit</p>
                        </li>
                        <li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-right tx-11 text-muted">1 day ago</a>
                            <p class="mb-0 text-muted tx-12">15% increased</p>
                        </li>
                        <li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-right tx-11 text-muted">1 day ago</a>
                            <p class="mb-0 text-muted tx-12">1.5k reviews</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


@section('js')
@endsection

