@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <!-- row -->
        <div class="row row-sm">
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Ziyaretçi İstatistikleri
                        </div>
                        <p class="mg-b-20">Günlük Ziyaretçi İstatistikleri.</p>
                        <div class="chartjs-wrapper-demo"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChart" class="chartjs-render-monitor" style="display: block;"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Toplam Satış
                        </div>
                        <p class="mg-b-20">Aylara Göre Toplam Satış İstatistikleri</p>
                        <div class="chartjs-wrapper-demo"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myCharta" class="chartjs-render-monitor" style="display: block; width: 517px; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row row-sm">
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Gelirler
                        </div>
                        <p class="mg-b-20">Aylık Gelir Dağılım Dağılımı.</p>
                        <div class="chartjs-wrapper-demo"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChartb" class="chartjs-render-monitor" style="display: block; width: 517px; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Area Chart
                        </div>
                        <p class="mg-b-20">Basic Charts Of Valex template.</p>
                        <div class="chartjs-wrapper-demo"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="chartArea1" class="chartjs-render-monitor" style="display: block; width: 412px; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
        </div>
        <!-- /row -->
    </div>
@endsection


@section('js')
    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {

            CKEDITOR.replace('content')
        })

        var ctx = document.getElementById('myChart');
        var ctx = document.getElementById('myChart').getContext('2d');
        var ctx = $('#myChart');
        var ctx = 'myChart';

        var ctx = document.getElementById('myChartb');
        var ctx = document.getElementById('myChartb').getContext('2d');
        var ctx = $('#myChartb');
        var ctx = 'myChartb';

        var ctx = document.getElementById('myCharta');
        var ctx = document.getElementById('myCharta').getContext('2d');
        var ctx = $('#myCharta');
        var ctx = 'myCharta';


        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                datasets: [{
                    label: 'Günlük Ziyaretçi İstatistikleri',
                    data: [12, 19, 3, 5, 2, 3,31,69,31,31,31],
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


        var ctx = document.getElementById('myChartb');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                datasets: [{
                    label: 'Gelir Dağılımı',
                    data: [12, 19, 3, 5, 2, 3,31,69,31,31,31],
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

        var ctx = document.getElementById('myCharta');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                datasets: [{
                    label: 'Toplam Satış',
                    data: [12, 19, 3, 5, 2, 3,31,69,31,31,31],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',

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


        /*const getData = async () => {
            const response = await fetch('https://www.tcmb.gov.tr/kurlar/today.xml?_=1595754692771')
            const data = await response.json()
            console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
            console.log(data , "aaaaaaaaaaaaaaaaaa")
            document.getElementById('data').innerHTML = data;
        }

        getData()*/

    </script>
@endsection
