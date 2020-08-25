@extends('Admin.index')


@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12">


            <div class="card">
                <div class="card-body">

                    <form action="{{route('product.imagestore')}}" class="dropzone rounded-5" id="dropzoneForm"  method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$id}}"  name="product_id" >
                    </form>
                    <div class="row mt-2">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <button type="button" class="btn btn-info-gradient  btn-block" id="submit-all">Yükle</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <a href="{{route('product.index')}}" class="btn btn-success-gradient  btn-block" >İşlemi Sonlandır</a>
                        </div>
                    </div>
                    <div align="center" class="mt-1 mb-2">

                    </div>
                    <hr>
                    <h3 class="panel-title">Ürün için yüklenen resimler</h3>

                    <div class="panel-body" id="uploaded_image">

                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

@endsection

@section('css')

    <link rel="stylesheet" href="/admin/dropzone/dist/basic.css">

    <link rel="stylesheet" href="/admin/dropzone/dist/dropzone.css">
@endsection


@section('js')

    <!--Internal Fileuploads js-->
    <script src="/admin/dropzone/index.js"></script>
    <script src="/admin/dropzone/dist/dropzone.js"></script>
    <script src="/admin/dropzone/dist/dropzone-and-module.js"></script>
    <script src="/admin/file-upload/js/jquery.fileupload.js"></script>




    <script type="text/javascript">

        Dropzone.options.dropzoneForm = {
            autoProcessQueue : false,
            acceptedFiles : ".png,.jpg,.jpeg",
            parallelUploads: 5,
            maxFiles:5,

            init:function(){
                var submitButton = document.querySelector("#submit-all");
                myDropzone = this;

                submitButton.addEventListener('click', function(){
                    myDropzone.processQueue();
                });

                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this = this;
                        _this.removeAllFiles();
                    }
                    load_images();
                });

            }

        };

        load_images();

        function load_images()
        {
            $.ajax({
                url:"{{ route('product.imagefetch') }}",
                data:{  product_id : {{$id}}
                },
                success:function(data)
                {
                    $('#uploaded_image').html(data);
                }
            })
        }


        $(document).on('click', '.remove_image', function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            console.log(name);
            $.ajax({
                url:"{{ route('product.imagedelete') }}",
                data:{name : name,
                    id : id
                },
                success:function(data){
                    load_images();
                }
            })
        });
    </script>
@endsection
