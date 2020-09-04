@extends('Admin.index')

@section('css')
    <!-- Internal Select2 css -->
    <link href="/admin/plugins/select2/css/select2.min.css" rel="stylesheet">
@endsection


@section('content')
    <!-- row -->
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
  @csrf
    <div class="row row-sm">

        <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Yeni Ürün ekle</h4>
                    <p class="mb-2">Buradan yeni ürün ekleye bilirsiniz</p>
                </div>
                <div class="card-body pt-0">

                        <div class="form-group">
                            <label >Ürün İsmi</label>
                            <input type="text" class="form-control" id="inputName" name="name"   value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label >Ürün açıklaması</label>
                            <textarea name="description" maxlength="650" class="form-control " id="" cols="30" rows="10">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label >Ürün Meta başlık</label>
                            <input type="text" class="form-control" id="inputName" name="metatitle"  value="{{old('metatitle')}}">
                        </div>
                        <div class="form-group">
                            <label >Ürün Meta açıklama metni</label>
                            <input type="text" class="form-control" name="metadescription"   value="{{old('metadescription')}}">
                        </div>

                         <div class="row">
                             <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label>Ürün kodu</label>
                                    <input type="text" class="form-control" name="product_code" value="{{old('product_code')}}">
                                </div>
                             </div>
                             <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label>Ürün Sabit Fiyatı</label>
                                     <input type="number" class="form-control" step="0.01" name="price" value="{{old('price')}}">
                                 </div>
                             </div>

                             <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label >Ürün kapak fotoğrafı</label>
                                    <input type="file" class="form-control"  name="image"  value="{{old('image')}}">
                                </div>
                             </div>
                         </div>

                </div>
            </div>
        </div>
<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
    <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">Ürün Seçenek bilgileri</h4>
                <p class="mb-2"> </p>
            </div>
            <div class="card-body pt-0">
        <div class="form-horizontal">

            <p class="mg-b-10">Ürün Kategorisi</p><select class="form-control select2" name="category" >
                <option label="Bir ürün kategorisi seçin">
                </option>
                @foreach($cats as $cat)
                <option value="{{$cat->id}}">
                    {{$cat->name}}
                </option>
                @endforeach

            </select>

        </div>
        <div class="form-horizontal mt-5">
            <div class="row mg-t-10">

                <div class="col-lg-6">
                    <label class="rdiobox"><input name="stock" checked type="radio" value="1"> <span>Ürün Var</span></label>
                </div>
                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                    <label class="rdiobox"><input  name="stock" type="radio" value="0"> <span>Ürün Yok</span></label>
                </div>
            </div>

        </div>

                <div class="form-horizontal mt-5">
                    <div class="row mg-t-10">

                        <div class="col-lg-6">
                            <label class="rdiobox"><input name="hasmeter" checked type="radio" value="1"> <span>m²  olacak</span></label>
                        </div>
                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <label class="rdiobox"><input  name="hasmeter" type="radio" value="0"> <span>m²  olmayacak</span></label>
                        </div>
                    </div>

                </div>



                <div class="form-horizontal mt-4">

                    <p class="mg-b-10">Seçenekler</p><select class="form-control select2" name="option" >
                        <option label="Ürün için Seçenek seçin">
                        </option>
                        @foreach($options as $option)

                            <option value="{{$option->id}}">
                                {{$option->name}}
                            </option>
                        @endforeach

                        <option value=" "> Seçenekler Kaldırılsın </option>

                    </select>

                </div>






                <div class="form-horizontal mt-3">
                    <p class="mg-b-10">Ek Seçenekler</p>
                    <select name="additional_options[]" class="form-control select2" multiple >
                        @foreach($additionaloptions as $adop)
                        <option value="{{$adop->id}}">
                            {{$adop->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>

    </div>
</div>
        <div class="form-group mb-0 mt-3 justify-content-end">
            <div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
                <button type="submit" class="btn btn-secondary">Vazgeç</button>
            </div>
        </div>
    </div>
    </form>
    <!-- row -->
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
@endsection
