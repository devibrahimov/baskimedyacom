<!DOCTYPE html>
<html lang="en">
 <head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
     <!-- Title -->
    <title>  Baskı Medya </title>
    <!-- Favicon -->
    <link rel="icon" href="/admin/img/brand/favicon.png" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="/admin/css/icons.css" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="/admin/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
    <!--  Right-sidemenu css -->
    <link href="/admin/plugins/sidebar/sidebar.css" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="/admin/css/sidemenu.css">
     <!-- Internal Data table css -->
     <link href="/admin/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
     <link href="/admin/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
     <link href="/admin/plugins/datatable/css/responsive.bootstrap4.min.css" rel="stylesheet" />
     <link href="/admin/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
     <link href="/admin/plugins/datatable/css/responsive.dataTables.min.css" rel="stylesheet">
     <link href="/admin/plugins/select2/css/select2.min.css" rel="stylesheet">
    <!--  Owl-carousel css-->
    <link href="/admin/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />


     @yield('css')
    <!-- Maps css -->
    <link href="/admin/plugins/jqvmap/jqvmap.min.css" rel="stylesheet">
    <!-- style css -->
    <link href="/admin/css/style.css " rel="stylesheet">
    <link href="/admin/css/style-dark.css" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="/admin/css/skin-modes.css" rel="stylesheet" />

    <!---Switcher css-->
    <link href="/admin/switcher/css/switcher.css" rel="stylesheet">
    <link href="/admin/switcher/demo.css" rel="stylesheet">

 </head>
<body class="main-body app sidebar-mini">


<!-- Loader -->
<div id="global-loader">
    <img src="/admin/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->


<!-- main-sidebar -->
@include('Admin.layouts.leftbar')
<!-- main-sidebar -->

<!-- main-content -->
<div class="main-content app-content">
    <!-- main-header -->
   @include('Admin.layouts.navbar')
    <!-- /main-header -->

    <!-- container -->
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
{{--            <div class="left-content">--}}
{{--                <div>--}}
{{--                    <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Merhaba, Hoşgeldiniz!</h2>--}}
{{--                    <p class="mg-b-0">Satışlarınıza dair tüm bilgileri buradan takip edebilirsiniz.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="main-dashboard-header-right">--}}
{{--                <div>--}}
{{--                    <label class="tx-13">Müşteri Değerlendirmeleri</label>--}}
{{--                    <div class="main-star">--}}
{{--                        <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <label class="tx-13">Online Satışlar</label>--}}
{{--                    <h5>563,275</h5>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <label class="tx-13">Offline Satışlar</label>--}}
{{--                    <h5>783,675</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <!-- /breadcrumb -->
        @if ($errors->any())
            <div class="example">
                    @foreach ($errors->all() as $error)

                    <div class="alert alert-danger border-3 mt-1 mg-b-0" role="alert">

                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>HATA MESAJI !</strong> {{$error}}
                    </div>


                @endforeach

            </div>
        @endif


{{--        success message--}}
        @if(session()->has('success'))
            <div class="alert alert-solid-success" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span></button>
                <strong><i class="fa fa-check"> </i> </strong>    {{ session()->get('success') }}
            </div>

        @endif


        {{--        error message--}}
        @if(session()->has('error'))
            <div class="alert alert-solid-danger" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span></button>
                <strong><i class="fa fa-times"> </i> </strong>    {{ session()->get('error') }}
            </div>

        @endif


        @yield('content')


    </div>
    <!-- /Container -->
</div>
<!-- /main-content -->

<!-- Footer opened -->
<div class="main-footer ht-40">
    <div class="container-fluid pd-t-0-f ht-100p">
        <span>Copyright © 2020 <a href="#">DijiPR</a>. </span>
    </div>
</div>

</body>
 <!-- JQuery min js -->
 <script src="/admin/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap Bundle js -->
 <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!--Internal Sparkline js -->
 <script src="/admin/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
 <!-- Custom Scroll bar Js-->
 <script src="/admin/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

 <!-- Eva-icons js -->
 <script src="/admin/js/eva-icons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
 @yield('datatables')


 <!--Internal  index js -->
 <script src="/admin/js/index.js"></script>
 <!--Internal  Datatable js -->
{{-- <script src="/admin/js/table-data.js"></script>--}}
 @yield('editor')

 @yield('js')
 <!-- Sticky js -->
 <script src="/admin/js/sticky.js"></script>
 <!-- custom js -->
 <script src="/admin/js/custom.js"></script><!-- Left-menu js-->
 <script src="/admin/plugins/side-menu/sidemenu.js"></script>
 <script src="/admin/switcher/js/switcher.js"></script>


</html>
