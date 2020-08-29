@extends('Site.index')

@section('content')


    @include('Site.partials.bread')


    <div class="section pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading_s1">
                        <h2>ücretsiz Katalog Talebi</h2>
                    </div>
                    <p class="leads">{{$setting->about?$setting->about : '' }}</p>
                    <div class="field_form">
                        <form method="post" name="enq">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input required placeholder="Adınız *" id="first-name" class="form-control"
                                           name="name" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <input required placeholder="Soyadınız *" id="email" class="form-control"
                                           name="email" type="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input required placeholder="Telefon numaranız *" id="phone" class="form-control"
                                           name="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <input placeholder="Email adresiniz" id="subject" class="form-control" name="subject">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea required placeholder="Adres *" id="description" class="form-control"
                                              name="message" rows="4"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" title="Submit Your Message!" class="btn btn-fill-out"
                                            id="submitButton" name="submit" value="Submit">Gönder
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <div id="alert-msg" class="alert-msg text-center"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
