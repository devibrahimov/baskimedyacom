@extends("Site.index")

@section('content')
    @include('Site.partials.bread')

    <div class="container">
        <div class="section pb_20 small_pt">
            <div class="container-fluid px-2">
                <div class="row no-gutters">
                    @foreach($services as $service)
                        <div class="col-md-4">
                            <div class=" sale_banner rounded-0">
                                <div class="card bg-dark text-white hover_effect1  rounded-0"
                                     style=" height:250px;  background: url('/storage/uploads/thumbnail/services/medium/{{$service->image}}') no-repeat;
                                         background-size: cover;background-position: center center !important;">
                                    <div class="card-img-overlay " style="background-color:rgba(0, 0, 0, 0.2);">
                                        <h4 class="card-title text-white "
                                            style="background-color: #00000082; border-radius: 20px; padding:10px;">{{$service->name}}</h4>
                                        <p class="card-text text-white" style="background-color: #00000082;">{{$service->header}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
