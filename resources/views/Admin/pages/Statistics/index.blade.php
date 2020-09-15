@extends('Admin.index')

@section('css')
@endsection
{{--@php--}}

{{--    foreach($browserandoperatingsystem as $key[0]){--}}
{{--    foreach ($key as $browser){--}}
{{--        print_r($browser[3]);--}}
{{--    }--}}
{{--}@endphp--}}
{{--@dd($browserandoperatingsystem)--}}
@section('content')
    <div class="container-fluid">
        <!-- row -->
        <div class="row row-sm">
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
                        <h5 class="card-title mb-0 pb-0">Hemen Çıkma Oranı :</h5>
                    </div>
                    <div class="card-body text-warning">
                        <h4> % {{number_format($performonsite["totalsForAllResults"]["ga:exitRate"],2)}}</h4>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                <div class="card card-warning">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">Ortalama Oturum Süresi :</h5>
                    </div>
                    <div class="card-body text-warning">
                        <h4>{{number_format(($performonsite["totalsForAllResults"]["ga:sessionDuration"]/3600),2)}} dk</h4>
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
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Ziyaretçi İstatistikleri
                        </div>
                        <p class="mg-b-20">Günlük Ziyaretçi İstatistikleri.</p>
                        <div class="chartjs-wrapper-demo">
                            <div class="chartjs-size-monitor"
                                 style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="visitorChart" class="chartjs-render-monitor" style="display: block;width: 100%;height: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
            <div class="col-sm-12 col-md-6">
                <div class="card mg-b-md-20 overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Tarayıcı İstatistikleri
                        </div>
                        <p class="mg-b-20">Oturumlara Göre Tarayıcı İstatistikleri.</p>
                        <div class="chartjs-wrapper-demo">
                            <div class="chartjs-size-monitor"
                                 style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="chartPie" class="chartjs-render-monitor"
                                    style="display: block; width: 100%; height: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {

            CKEDITOR.replace('content')
        })

        var ctx = document.getElementById('visitorChart');
        var ctx = document.getElementById('visitorChart').getContext('2d');
        var ctx = $('#visitorChart');
        var ctx = 'visitorChart';


        var ctx = document.getElementById('visitorChart');
        var visitorchart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [@foreach($pages as $val)@if($loop->first)"{{$val}}"@else , "{{$val}}" @endif @endforeach],
                datasets: [{
                    label: 'Haftalık Ziyaretçi İstatistikleri',
                    data: [@foreach($pageconut as $val)@if($loop->first){{$val}}@else{{','.$val}}@endif @endforeach],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('chartPie');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [@foreach($browserandoperatingsystem as $key[0])
                @foreach ($key as $browser)
                '{{$browser[0]}}.{{$browser[1]}}',
                    @endforeach
                    @endforeach],
                datasets: [{
                    label: 'Toplam Satış',
                    data: [@foreach($browserandoperatingsystem as $key[0])
                        @foreach ($key as $browser)
                        {{$browser[3]}},
                        @endforeach
                        @endforeach],
                    backgroundColor: [
                        'rgb(26, 50, 71)',
                        'rgb(105, 255, 255)',
                        'rgb(26, 50, 255)',
                        'rgb(255, 50, 255)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
