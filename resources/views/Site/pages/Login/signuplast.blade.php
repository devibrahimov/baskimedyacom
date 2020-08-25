@extends('Site.index')


@section('content')
    <style>
        .form-control{
            height: 40px !important;
            font-size: 0.9rem !important;
        }
        /*.header_wrap.transparent_header + .breadcrumb_section {*/
        /*    padding-top: 200px !important;*/
        /*}*/
    </style>

    @include('Site.partials.bread')


    <div class="main_content">
        @foreach ($errors->all() as $error)


                <strong>HATA MESAJI !</strong> {{$error}}


    @endforeach
        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
               <div class="row">
                   <div class="card">
                       <div class="card-body">
                           {{--                    <p>Already have an account? <a href="#">Log in instead!</a></p> registerimage.jpg--}}
                           <form method="post" action="{{route('site.signup')}}" role="form" method="post">
                               <div class="row">
                                <div class="col-md-3" style="height:700px; background:url('/assets/images/registerimage.jpg') no-repeat;
                                background-size: cover;background-position: center center !important;"></div>
                                   <div class="col-md-9">
                                       <div class="row">
                                           <div class="form-group col-md-12">
                                               <label>Firma adı <span class="required">*</span></label>
                                               <input required="" class="form-control" name="company_name" type="text">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>Ad <span class="required">*</span></label>
                                               <input required="" class="form-control" name="name" type="text">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>Soyad  <span class="required">*</span></label>
                                               <input required="" class="form-control" name="surname">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>Email Adresi <span class="required">*</span></label>
                                               <input required="" class="form-control" name="email" type="email">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>TC-KİMLİK NUMARANIZ <span class="required">*</span></label>
                                               <input required="" class="form-control" placeholder="Doğru girdiyinizden emin olsun." name="passportid" id="passportid" type="number">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>il <span class="required">*</span></label>
                                               <select class="form-control" name="province" id="province">
                                                   <option selected disabled>Bir il Seçin</option>
                                                    @foreach($provinces as $province)
                                                       <option  value="{{$province->province_no}}">{{$province->name}}</option>
                                                    @endforeach
                                               </select>
                                           </div>

                                           <div class="form-group col-md-6">
                                               <label>ilçe <span class="required">*</span></label>
                                               <select class="form-control" name="district" id="districts">
                                                   <option selected disabled>Bir ilçe Seçin</option>
                                                {{--buraya veri ajax ile geliyor --}}
                                               </select>
                                           </div>

                                           <div class="form-group col-md-6">
                                               <label>GSM <span class="required">*</span></label>
                                               <input required="" class="form-control" name="gsm" type="number">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>GSM 2  </label>
                                               <input  class="form-control" name="gsm2" type="number">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>Sabit Telefon </label>
                                               <input   class="form-control" name="phone" type="number">
                                           </div>
                                           @csrf
                                           <div class="form-group col-md-6">
                                               <label>Sabit Telefon 2 </label>
                                               <input  class="form-control" name="phone2" type="number">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>New Password <span class="required">*</span></label>
                                               <input required="" class="form-control" name="password" type="password">
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label>Confirm Password <span class="required">*</span></label>
                                               <input required="" class="form-control" name="password_confirmation" type="password">
                                           </div>
                                           <div class="col-md-12">
                                               <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->


    </div>
    <!-- END MAIN CONTENT -->


@endsection



@section('js')
    <script type="text/javascript">
        $(function () {

            $('#province').on('change', function() {
               var provinceid =  $(this).find(":selected").val() ;


                $.ajax({ /* AJAX REQUEST */
                    type: 'post',
                    url: "{{ route('get.districts') }}",
                    data: {'provinceno': provinceid,
                        "_token": "{{ csrf_token() }}"
                        },
                    success: function(data) {
                        $('#districts').html(data);
                    }
                });



            });

            // $("#btnSubmit").click(function () {
            //     var password = $("#txtPassword").val();
            //     var confirmPassword = $("#txtConfirmPassword").val();
            //     if (password != confirmPassword) {
            //
            //         var htmlString = "Şifreler Eşleşmiyor.Tekrar deneyin";
            //         $('#hatamesaji').text( htmlString );
            //         return false;
            //     }
            //     return true;
            // });
        });



    </script>
@endsection
