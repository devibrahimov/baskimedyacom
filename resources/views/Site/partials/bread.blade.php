<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section   page-title-mini" style="background-image: url('/assets/images/unnamed.png');">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>{{$breadcrump['thispage']}}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end ">
                    <li class="breadcrumb-item "><a class=" font-weight-bold" href="{{route('site.index')}}">Ana Sayfa</a></li>
                    @if( isset($breadcrump['parentpage'])&& isset($breadcrump['parentURL'] ) )
                        <li class="breadcrumb-item"><a href="{{ $breadcrump['parentURL']}}"  class="font-weight-bold" >{{ $breadcrump['parentpage']}}</a></li>
                    @endif
                    <li class="breadcrumb-item active"><a href="{{$breadcrump['thispageURL']}}"  class="text-white font-weight-bold" >{{$breadcrump['thispage']}} </a> </li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>


<!-- END SECTION BREADCRUMB -->
