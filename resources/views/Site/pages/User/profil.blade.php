@extends('Site.index')

@section('css')
@endsection


@section('content')

   @include('Site.partials.bread')

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="dashboard_menu">
                            <ul class="nav nav-tabs flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Kullanıcı Hesabı</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Siparişlerim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#corporative" role="tab" aria-controls="corporative" aria-selected="true"><i class="fa fa-building "></i>Kurumsal Bilgiler</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Hesap Bilgileri</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#password" role="tab" aria-controls="address" aria-selected="true"><i class="ti-lock"></i>Şifrenizi Güncelleyin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                @include('Site.pages.User.partials.dashboard')
                            </div>
                            <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                @include('Site.pages.User.partials.orders')
                            </div>
                            <div class="tab-pane fade" id="corporative" role="tabpanel" aria-labelledby="address-tab">
                                @include('Site.pages.User.partials.corporative')
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                @include('Site.pages.User.partials.account_detail')
                            </div>

                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="account-detail-tab">
                                @include('Site.pages.User.partials.change_password')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->



    </div>
    <!-- END MAIN CONTENT -->


@endsection


@section('js')
    <script type="text/javascript">
        $(function () {
            var province_no = $( "#province option:selected" ).val();

            if (province_no){
                console.log(province_no);

                $.ajax({ /* AJAX REQUEST */
                    type: 'post',
                    url: "{{ route('get.districts') }}",
                    data: {
                        'provinceno': province_no,
                        'district_no' : {{$user->user_district}},
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#districts').html(data);
                    }
                });

            }


            $('#province').on('change', function() {
                var province_no=  $(this).find(":selected").val() ;



                $.ajax({ /* AJAX REQUEST */
                    type: 'post',
                    url: "{{ route('get.districts') }}",
                    data: {
                        'provinceno': province_no,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        $('#districts').html(data);
                    }
                });



            });


        });
    </script>
@endsection
