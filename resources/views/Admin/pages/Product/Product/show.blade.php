@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-0" style="height:409px;  background: url('/storage/uploads/thumbnail/products/medium/{{$product->image}}') no-repeat;
                                    background-size: cover;background-position: center center !important;">

                                </div>

                                @foreach($productimages as $image)
                                    <div class="tab-pane " id="pic-{{$image->id}}" style="height:409px;  background: url('/storage/uploads/thumbnail/products/medium/{{$image->name}}') no-repeat;
                                        background-size: cover;background-position: center center !important;">
                                        {{--                                    <img src="/storage/uploads/thumbnail/products/medium/{{$image->name}}" alt="image"/>--}}
                                    </div>
                                @endforeach
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li style="margin-right: 0% !important;" ><a data-target="#pic-0" data-toggle="tab" >
                                        <div class="tab-pane " id="pic-0" style="height:50px;  background: url('/storage/uploads/thumbnail/products/small/{{$product->image}}') no-repeat;
                                            background-size: cover;background-position: center center !important;">
                                        </div>   </a></li>
                                @foreach($productimages as $image)
                                    <li style="margin-right: 0% !important;"><a data-target="#pic-{{$image->id}}" data-toggle="tab" >
                                            <div class="tab-pane " id="pic-{{$image->id}}" style="height:50px;  background: url('/storage/uploads/thumbnail/products/small/{{$image->name}}') no-repeat;
                                                background-size: cover;background-position: center center !important;">
                                                {{--                                        <img src="/storage/uploads/thumbnail/products/small/{{$image->name}}" alt="image"/>--}}
                                            </div>   </a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h4 class="product-title mb-1">{{$product->name}}</h4>
                            <p class="text-muted tx-13 mb-1">Men red & Grey Checked Casual Shirt</p>
                            <div class="rating mb-3 mt-3">

                                <span class="review-no">Ürün kodu : {{$product->product_code}}</span>
                            </div>
                            <h6 class="price">Ürün Fiyatı: <span class="h3 ml-2">${{$product->price}} - ₺ {{$product->price}}</span></h6>
                            <p class="product-description">

                                {{$product->description}}</p>


                            <div class="d-flex  mt-2">
                                <div class="mt-2 product-title">Stock biligisi:  </div>

                            </div>
                            <div class="action">
                                <button class="add-to-cart btn btn-primary" type="button">Düzenle</button>
                                <button class="add-to-cart btn btn-danger" type="button">Sil</button>
                            </div>
                        </div>
                    </div>


                    <div class="row row-sm  mt-5">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0 text-md-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Seçenek</th>
                                        <th>Fiyat $</th>
                                        <th>Fiyat tl</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($product->parent_option != NULL)
                                        <div class="sizes d-flex">Seçenekler:     </div>

                                        @foreach($product->options($product->parent_option) as $option)

                                            <tr>
                                                <th scope="row">1</th>
                                                <td> {{$option->name}}</td>
                                                <td> </td>
                                                <td>$450,870</td>
                                            </tr>
                                        @endforeach



                                    @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sizes d-flex">Ek Seçenekler:     </div>
                            @if($product->additional_options != NULL)


                                @foreach( $product->additionaloptionsparent($product->additional_options) as $options)

                                    <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">

                                        @foreach($options as $key => $option)
                                            <div class="card mb-0">
                                                <div class="card-header" id="headingOne" role="tab">
                                                    <a aria-controls="collapse{{$option->id}}" aria-expanded="true" data-toggle="collapse" href="#collapse{{$option->id}}">{{$option->name}}</a>
                                                </div>
                                                <div aria-labelledby="heading{{$option->id}}" class="collapse " data-parent="#accordion" id="collapse{{$option->id}}" role="tabpanel">
                                                    <div class="card-body">
                                                        @foreach($product->additionaloption($option->id)  as $opt)
                                                            <pre>{{  $opt->name  }} </pre>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endforeach
                                    </div><!-- accordion -->
                                    @endif

                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


@section('js')
@endsection
