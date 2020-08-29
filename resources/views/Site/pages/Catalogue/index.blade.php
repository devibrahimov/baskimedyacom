@extends('Site.index')

@section('content')
    @include('Site.partials.bread')

    @if(session()->has('success'))
        <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                        </button>
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <div class="background_bg h-100" data-img-src="/assets/images/sendingemail.jpg"></div>
                            </div>
                            <div class="col-sm-7">
                                <div class="popup_content">
                                    <div class="popup-text">
                                        <div class="heading_s4">
                                            <h4>Talebiniz İletildi!</h4>
                                        </div>
                                        <p> Baskı Medya takımı olarak sizlere hizmet göstermekten memnuniyet duyuyoruz!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="section pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading_s1">
                        <h2>ücretsiz Katalog Talebi</h2>
                    </div>
                    <p class="leads">{{$setting->about?$setting->about : '' }}</p>
                    <div class="field_form">
                        <form method="post" action="{{route('catalogue.add')}}" name="enq">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input required placeholder="Adınız *" id="first-name" class="form-control"
                                           name="name" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <input required placeholder="Soyadınız *" id="email" class="form-control"
                                           name="lastname" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <input required placeholder="Telefon numaranız *" id="phone" class="form-control"
                                           name="phone" type="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <input placeholder="Email adresiniz" id="subject" class="form-control" name="email"
                                           type="email">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea required placeholder="Adres *" id="description" class="form-control"
                                              name="adres" rows="4"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" title="Submit Your Message!" class="btn btn-fill-out"
                                            name="submit" value="Submit">Gönder
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
