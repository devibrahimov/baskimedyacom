@extends('Site.index')

@section('css')
@endsection


@section('content')


        <div class="section">






            <div class="container">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($cats as $cat)
                    <li class="nav-item">
                        <a class="nav-link {{$loop->first? 'active' : ''}}" id="{{\Illuminate\Support\Str::slug($cat->name)}}-tab" data-toggle="tab" href="#{{\Illuminate\Support\Str::slug($cat->name)}}" role="tab" aria-controls="{{\Illuminate\Support\Str::slug($cat->name)}}" aria-selected="  {{$loop->first? true : false}}">{{$cat->name}}</a>
                    </li>
                    @endforeach

                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach($infos as $info)
                    <div class="tab-pane fade {{  $loop->first ? 'show active': ''}}" id="{{\Illuminate\Support\Str::slug($info->category->name)}}" role="tabpanel" aria-labelledby="{{\Illuminate\Support\Str::slug($info->category->name)}}-tab">  {!! $info->content !!}</div>
                    @endforeach

                </div>



            </div>
    </div>



@endsection


@section('js')
@endsection
