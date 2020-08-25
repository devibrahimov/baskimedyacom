@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <!-- row -->
    <div class="row row-sm">

        <div class="col-xl-12 col-lg-12 col-md-12">

            <div class="row row-sm">



                @foreach($products as $product)

                <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box"  style="height:250px;  background: url('/storage/uploads/thumbnail/products/medium/{{$product->image}}') no-repeat;
                                background-size: cover;background-position: center center !important;">


                            </div>

                            <button data-toggle="dropdown" class="btn btn-indigo btn-block">İşlemler <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                            <div class="dropdown-menu">
                                <a href="{{route('product.show',$product->id)}}" class="dropdown-item"> <i class="typcn typcn-eye"></i> Bak</a>

                                <a href="{{route('product.edit',$product->id)}}" class="dropdown-item"> <i class="las la-edit"></i> Düzenle</a>

                                <a href="{{route('product.show',$product->id)}}" class="dropdown-item"> <i class="las la-trash"></i> Sil</a>

                            </div>
                            <div class="text-center pt-3">
                                <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$product->name}}</h3>

                                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">${{$product->price}} <span class="text-secondary font-weight-normal tx-13 ml-1 ">₺59</span></h4>
                            </div>

                        </div>

                    </div>
                </div>

                @endforeach


            </div>
            <ul class="pagination product-pagination ml-auto float-right">
                <li class="page-item page-prev disabled">
                    <a class="page-link" href="#" tabindex="-1">Prev</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item page-next">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- row closed -->
@endsection


@section('js')
@endsection
