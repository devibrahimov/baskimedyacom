@extends('Site.index')

@section('meta')

    <meta name="title" content="{{$setting->metatitle?$setting->metatitle:''}}">
    <meta name="description" content="Baskıda dijital  Hizmet ve Ürünlerimiz reismlerde  sergilenmektedir.Baskımedya Dijital Baskının Merkezi">

@endsection

@section('content')

    @include('Site.partials.bread')
    <div class="container py-5">
        <div class="row">
            @foreach($galleries as $gallery)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" id="aniimated-thumbnials" >
                        <img width="100%" height="400"
                             src="/storage/uploads/thumbnail/gallery/medium/{{$gallery->name}}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
