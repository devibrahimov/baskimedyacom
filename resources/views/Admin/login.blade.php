<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
    <!-- Title -->
    <title>Baskı Medya Yönetim Paneli </title>
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
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="/admin/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css" rel="stylesheet">
    <!-- Maps css -->
    <link href="/admin/plugins/jqvmap/jqvmap.min.css" rel="stylesheet">
    <!-- style css -->
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/css/style-dark.css" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="/admin/css/skin-modes.css" rel="stylesheet" />

    <!---Switcher css-->
    <link href="/admin/switcher/css/switcher.css" rel="stylesheet">
    <link href="/admin/switcher/demo.css" rel="stylesheet">	</head>

<body class="main-body bg-primary-transparent">
<!-- Loader -->
<div id="global-loader">
    <img src="/admin/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="/admin/img/media/login.png" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex"> <a href="index.html"><img src="/admin/img/brand/favicon.png" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Baskı<span>Media</span></h1></div>
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>Yönetim Paneli</h2>
                                        @if ($errors->any())

                                                @foreach ($errors->all() as $error)

                                                    <div class="alert alert-danger border-3 mt-1 mg-b-0" role="alert">

                                                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>HATA MESAJI !</strong> {{$error}}
                                                    </div>


                                                @endforeach


                                        @endif


                                        <form action="{{route('admin.login')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" name="email" required maxlength="45" type="email" value="{{old('email')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" name="passwd" required  maxlength="30"  type="password">
                                            </div><button class="btn btn-main-primary btn-block">Sign In</button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
</div>

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Bundle js -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ionicons js -->
<script src="/admin/plugins/ionicons/ionicons.js"></script>
<!-- Moment js -->
<script src="/admin/plugins/moment/moment.js"></script>

<!-- Rating js-->
<script src="/admin/plugins/rating/jquery.rating-stars.js"></script>
<script src="/admin/plugins/rating/jquery.barrating.js"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/admin/plugins/perfect-scrollbar/p-scroll.js"></script>
<!--Internal Sparkline js -->
<script src="/admin/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Scroll bar Js-->
<script src="/admin/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- right-sidebar js -->
<script src="/admin/plugins/sidebar/sidebar.js"></script>
<script src="/admin/plugins/sidebar/sidebar-custom.js"></script>
<!-- Eva-icons js -->
<script src="/admin/js/eva-icons.min.js"></script>
<!-- Sticky js -->
<script src="/admin/js/sticky.js"></script>
<!-- custom js -->
<script src="/admin/js/custom.js"></script><!-- Left-menu js-->
<script src="/admin/plugins/side-menu/sidemenu.js"></script>

<!-- Switcher js -->
<script src="/admin/switcher/js/switcher.js"></script>
</body>
 </html>
