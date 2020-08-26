@extends('Site.index')


@section('content')
    @include('Site.partials.bread')
    <!-- STAT SECTION ABOUT -->
    <div class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about_img scene mb-4 mb-lg-0" style="height:400px;  background: url('/uploads/setting/{{$company->image}}') no-repeat;
                        background-size: cover;background-position: center center !important;">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="heading_s1">
                        <h2>@if(isset($company)){!! $company->header !!}@endif</h2>
                    </div>@if(isset($company)){!! $company->content !!}@endif </div>
            </div>
        </div>
    </div>
    <!-- END SECTION ABOUT -->

@endsection



@section('css')

@endsection




@section('js')

@endsection
