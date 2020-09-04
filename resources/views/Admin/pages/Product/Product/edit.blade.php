@extends('Admin.index')

@section('css')
{{--    <!-- Internal Select2 css -->--}}
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css" >
    <style>
        /* Container */
        .container{
            margin: 0 auto;
            border: 0px solid black;
            width: 50%;
            height: 250px;
            border-radius: 3px;
            background-color: ghostwhite;
            text-align: center;
        }
        /* Preview */
        .preview{
            width: 200px;
            height: 200px;
            border: 1px solid black;
            background: white;
        }

        .preview img{
            margin-bottom: 10px;
            display: none;
        }
        /* Button */
        .button{
            border: 0px;
            background-color: deepskyblue;
            color: white;
            padding: 5px 15px;
            margin-left: 10px;
        }
    </style>
@endsection


@section('content')
    <!-- row -->

        <div class="row row-sm">


            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                    @csrf
                    @method('PUT')
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">  Ürün Düzenleme Sayfası</h4>
                    </div>
                    <div class="card-body pt-0">

                        <div class="form-group">
                            <label  for="inputName">Ürün İsmi</label>
                          <input type="text" class="form-control" id="inputName" name="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Ürün açıklaması</label>
                            <textarea name="description" maxlength="650" class="form-control " id="" cols="20" rows="5">{{$product->description }}</textarea>
                        </div>
                        <div class="row">
                        @foreach(json_decode($product->meta) as $k=>$v)
                         <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label >Ürün Meta {{$k}}</label>
                                <input type="text" class="form-control" id="inputName" name="meta{{$k}}"  value="{{$v}}">
                            </div>
                         </div>
                        @endforeach
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="product_code">Ürün kodu</label>
                                    <input type="text" class="form-control" name="product_code"   value="{{ $product->product_code }}">
                                </div>
                            </div>

                        </div>{{--end row--}}
                        <div class="row">
                            <div class="col-lg-6">  <div class="form-horizontal">

                                    <p class="mg-b-10">Ürün Kategorisi</p><select class="form-control select2" name="category" >
                                        <option label="Bir ürün kategorisi seçin">
                                        </option>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}"@if($product->category == $cat->id) selected @endif>
                                                {{$cat->name}}
                                            </option>
                                        @endforeach

                                    </select>

                                </div></div>

                            <div class="col-lg-6">   <div class="form-horizontal">
                                    <p class="mg-b-10">Ek Seçenekler</p>
                                    <select name="additional_options[]" class="form-control select2" multiple >


                                            @foreach($additionaloptions as $adoption)
                                            <option value="{{$adoption->id}}" @if(isset($product_adops)){{in_array($adoption->id,$product_adops)? 'selected' :'' }}  @endif >
                                                {{$adoption->name}}
                                            </option>
                                            @endforeach


                                    </select>
                                </div></div>
                        </div>{{--end row--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-horizontal mt-2">

                                    <p class="mg-b-10">Seçenekler</p>
                                    <select class="form-control select2" name="option" >
                                        <option label="Ürün için Seçenek seçin">
                                        </option>
                                        @foreach($options as $option)
                                            <option  value="{{$option->id}}" @if($product->parent_option == $option->id) selected @endif>
                                                {{$option->name}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        <div class="col-lg-6">
                            <div class="form-horizontal mt-5">
                                <div class="row mg-t-10">

                                    <div class="col-lg-6">
                                        <label class="rdiobox"><input name="stock" {{$product->stock==1?'checked':''}} type="radio" value="1"> <span>Ürün Var</span></label>
                                    </div>
                                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                        <label class="rdiobox"><input  name="stock" {{$product->stock==0?'checked':''}}  type="radio" value="0"> <span>Ürün Yok</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{--end row--}}
                    </div>
                    <div class="card-footer">
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div >
                                <input type="submit" class="btn btn-primary" value="Güncelle">
                                <a href="{{route('product.index')}}" class="btn btn-secondary">Vazgeç</a>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
            </div>
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">


                <div class="card  box-shadow-0">
                    <div class="card-header">
                        @if($images->count() <5)
                            <a href="{{route('product.images',$product->id)}}" class="btn btn-info btn-with-icon btn-block rounded-0" type="submit"><i class="typcn typcn-image"></i>Resim Ekle</a>
                        @endif
                    </div>
                    <div class="card-body pt-0">

                        <div class="row  border-dark">

                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="card text-center">
                                    <div style="height:200px;background: url('/storage/uploads/thumbnail/products/medium/{{$product->image}}') no-repeat;
                                        background-size: cover;background-position: center center !important;" ></div>

                                    {{--                                        <form action="{{route('product.imageupdate',$product->id)}}" method="post" enctype="multipart/form-data" class="card-body">--}}
                                    {{--                                            @csrf--}}

                                    {{--                                        <input type="file" name="image" >--}}
                                    <a class="btn btn-info  btn-with-icon btn-block rounded-0"  id="productcoverimage" data-productid="{{$product->id}}" data-imagename="{{$product->image}}" data-toggle="modal" href="#modaldemo8"  ><i class='typcn typcn-image'></i>  Güncelle </a>
                                    {{--                                        </form>--}}

                                </div>
                            </div>

                            @foreach($images as $img)
                                <div class="col-xl-3 col-lg-3 col-md-6">
                                    <div class="card text-center">
                                        <div style="height:200px;background: url('/storage/uploads/thumbnail/products/medium/{{$img->name}}') no-repeat;
                                            background-size: cover;background-position: center center !important;" ></div>

                                        <div class="btn-icon-list ">
                                            <button type="submit" class="btn btn-info btn-with-icon rounded-0 btn-block productcoverimage" data-toggle="modal" href="#modaldemo8"   data-productid="{{$product->id}}"data-imageid="{{$img->id}}" data-imagename="{{$img->name}}" ><i class="typcn typcn-image"></i> Güncelle</button>

                                            <form action="{{route('product.productimagedelete')}}"  method="post">
                                                @csrf   <input type="hidden" name="name" value="{{$img->name}}"> <input type="hidden" name="id" value="{{$img->id}}">
                                                <button class="btn btn-danger btn-with-icon btn-block rounded-0 " type="submit"><i class="typcn typcn-trash"></i> Sil</button>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            @endforeach

                        </div>


                    </div>
                </div>

            </div>
             </div>

        </div>

    <!-- row -->
    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Ürün Fotoğrafını Değiştir</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" >
                    <div id="showimage" class="mb-2">

                    </div>
                    <div id="editimageform">

                    </div>


                  </div>
                <div class="modal-footer">   </div>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->

@endsection


@section('js')

    {{--    <!-- Moment js -->--}}
    <script src="/admin/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

    <!--Internal  jquery.maskedinput js -->
    <script src="/admin/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="/admin/plugins/spectrum-colorpicker/spectrum.js"></script>
    <!-- Internal Select2.min js -->
    <script src="/admin/plugins/select2/js/select2.min.js"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="/admin/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
    <!-- Ionicons js -->
    <script src="/admin/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
    <!--Internal  pickerjs js -->
    <script src="/admin/plugins/pickerjs/picker.min.js"></script>

    <!-- Internal form-elements js -->
    <script src="/admin/js/form-elements.js"></script>
    <script src="/admin/js/modal.js"></script>

    <script>
        $(document).ready(function(){

            $('#productcoverimage').click(function (){

                var id = $(this).data('productid');
                var imagename = $(this).data('imagename');

                 var image = '<img src="/storage/uploads/thumbnail/products/medium/'+imagename+'"   width="200" height="200">';

                   var form = '<form action="{{route('product.imageupdate')}}" method="post" enctype="multipart/form-data">@csrf <input type="hidden" class="form-control" name="productid" value="{{$product->id}}"> <input type="hidden" class="form-control" name="productimg" value="{{$product->image}}"> <input type="hidden" name="imagetype" value="1"> <div class="input-group">\n' +
                       ' <input type="file" class="form-control" name="image"> <span class="input-group-btn"><button class="btn btn-primary rounded-0" type="submit"><span class="input-group-btn">Deyiştir</span></button></span>\n' +
                   ' </div>  </form>';

                $("#showimage").html(image);
                $("#editimageform").html(form);
                console.log(id+'--'+imagename);
            });

            $('.productcoverimage').click(function (){

                var productid = $(this).data('productid');
                var imagename = $(this).data('imagename');
                var imageid = $(this).data('imageid');
                var image = '<img src=   "/storage/uploads/thumbnail/products/medium/'+imagename+'"   width="200" height="200">';
                var form = '<form action="{{route('product.imageupdate')}}" method="post" enctype="multipart/form-data">@csrf <input type="hidden"  name="productid" value="'+productid+'"> <input type="hidden"  name="imagename" value="'+imagename+'"> <input type="hidden"  name="imageid" value="'+imageid+'">  <input type="hidden" name="imagetype" value="2"> <div class="input-group">\n' +
                    ' <input type="file" class="form-control" name="image"> <span class="input-group-btn"><button class="btn btn-primary rounded-0" type="submit"><span class="input-group-btn">Deyiştir</span></button></span>\n' +
                    ' </div>  </form>';

                $("#showimage").html(image);
                $("#editimageform").html(form);
                console.log(id+'--'+imagename+'----'+imageid);
            });

        });

    </script>
@endsection
