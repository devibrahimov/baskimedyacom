@extends('Admin.index')

@section('content')

    <div class="row row-sm">


        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        REFERANSLAR
                    </div>
                    <p class="mg-b-20">Bir Referans Ekleyin</p>
                    <form method="post" action="{{route('references.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <input class="form-control" placeholder="Referans Adı" required="" type="text"
                                           name="name">
                                </div>
                            </div>
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <div class="form-group mg-b-0">
                                    <div class="row row-sm">
                                        <input class="custom-file-input" id="customFile" type="file" name="image"> <label
                                            class="custom-file-label" for="customFile">Resim Yükle</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="py-4 float-right">
                            <button type="submit" class="btn btn-success">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">


            <div class="card  box-shadow-0">
                <div class="card-header">

                </div>
                <div class="card-body pt-0">

                    <div class="row  border-dark">



                        @foreach($references as $reference)
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="card text-center">
                                    <div style="height:100px;background: url('/storage/uploads/thumbnail/references/medium/{{$reference->image}}') no-repeat;
                                        background-size: cover;background-position: center center !important;" ></div>
                                        <div class="card-body border-top">
                                            <h4> {{$reference->name}}</h4>
                                        </div>
                                    <div class="btn-icon-list ">
                                        <button type="button" class="btn btn-info btn-with-icon rounded-0 btn-block referenceimage" data-toggle="modal" href="#modaldemo8"   data-referencesname="{{$reference->name}}" data-referencesid="{{$reference->id}}" data-imagename="{{$reference->image}}" ><i class="typcn typcn-image"></i> Güncelle</button>

                                        <form action="{{route('references.destroy',$reference->id)}}"  method="post">
                                            @csrf   @method('DELETE')
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
    <script>
    $(document).ready(function(){
        $('.referenceimage').click(function (){

        var referencename = $(this).data('referencesname');
        var imagename = $(this).data('imagename');
        var referenceid = $(this).data('referencesid');

        var image = '<img src=   "/storage/uploads/thumbnail/references/medium/'+imagename+'"   width="200" height="200">';
        var form = '<form action="{{route('reference.updatemethod')}}" method="post" enctype="multipart/form-data">@csrf <input type="text" name="name"   class="form-control mb-1"  value="'+referencename+'">  <input type="hidden"  name="imagename" value="'+imagename+'"> <input type="hidden"  name="referenceid" value="'+referenceid+'"> <div class="input-group">\n' +
            ' <input type="file" class="form-control" name="image"> <span class="input-group-btn"><button class="btn btn-primary rounded-0" type="submit"><span class="input-group-btn">Deyiştir</span></button></span>\n' +
            ' </div>  </form>';

        $("#showimage").html(image);
        $("#editimageform").html(form);
        console.log(id+'--'+imagename+'----'+imageid);
    });
    });
    </script>
@endsection
