@extends('Admin.index')


@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="demo-gallery">
                        <ul id="lightgallery" class="list-unstyled row row-sm">
                          @foreach($images as $img)
                            <li class="col-sm-6 col-lg-2" data-responsive="/storage/uploads/gallery/{{$img->name}}" data-src="/storage/uploads/gallery/{{$img->name}}" data-sub-html="<h4>Gallery Image 1</h4>" >
                                <a href="#">
                                    <img class="img-responsive" src="/storage/uploads/thumbnail/gallery/small/{{$img->name}}" alt="Thumb-1">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- /Gallery -->

                        <!-- Pagination -->
                        <div class="row mb-5">
                            <div class="col-md-6 mt-1 d-none d-md-block">1 - 10 of 234 photos</div>
                            <div class="col-md-6">
                                <div class="float-right">
                                    <ul class="pagination search">
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
                            </div><!-- COL-END -->
                        </div>
                        <!-- Pagination -->
                    </div>









                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

<!--Internal Sumoselect css-->
<link rel="stylesheet" href="/admin/plugins/sumoselect/sumoselect.css">
    <!-- Internal Gallery css -->
    <link href="/admin/plugins/gallery/gallery.css" rel="stylesheet">
@endsection


@section('js')


    <!-- Internal Gallery js -->
    <script src="/admin/plugins/gallery/lightgallery-all.min.js"></script>
    <script src="/admin/plugins/gallery/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/gallery.js"></script>
@endsection
