@extends('Site.index')

@section('meta')

    <meta name="title" content="{{$setting->metatitle?$setting->metatitle:''}}">
    <meta name="description" content="Bizimle İletişime Geçin : {{$setting->number?$setting->number:'' }} , {{$setting->phone?$setting->phone:''}} . Adresimiz :{{$setting->address?$setting->address:''}}">

@endsection

@section('content')


    @include('Site.partials.bread')

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION CONTACT -->
        <div class="section pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="contact_wrap contact_style3">
                            <div class="contact_icon">
                                <i class="linearicons-map2"></i>
                            </div>
                            <div class="contact_text">
                                <span>Adres</span>
                                <p>{{$setting?$setting->address : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="contact_wrap contact_style3">
                            <div class="contact_icon">
                                <i class="linearicons-envelope-open"></i>
                            </div>
                            <div class="contact_text">
                                <span>Email</span>
                                <a href="mailto:info@sitename.com">{{$setting?$setting->email : '' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="contact_wrap contact_style3">
                            <div class="contact_icon">
                                <i class="linearicons-tablet2"></i>
                            </div>
                            <div class="contact_text"  style="max-height: 147px;">
                                <span>İrtibat</span>
                                <p>{{$setting?$setting->number : '' }} <br>{{$setting?$setting->phone : '' }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CONTACT -->

        <!-- START SECTION CONTACT -->
        <div class="section pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>İletişime Geçin</h2>
                        </div>
                        <p class="leads">{{$setting->about?$setting->about : '' }}</p>
                        <div class="field_form">
                            <form method="post" name="enq" action="{{route('add.contact')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input required        placeholder="Adınız Soyadınız *" id="first-name" class="form-control" name="ad" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input required        placeholder="Email adresiniz*" id="email" class="form-control" name="eposta" type="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input required        placeholder="Telefon numaranız. *" id="phone" class="form-control" name="telefon" type="number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input        placeholder="Mesaj başlığı" id="subject" class="form-control" name="subject" type="text">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea        required placeholder="Mesajınız *" id="description" class="form-control" name="mesaj" rows="4" type="text"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" id="submit" name="submit" value="Submit">Send Message</button>
                                    </div>
{{--                                    <div class="col-md-12">--}}
{{--                                        <div id="alert-msg" class="alert-msg text-center"></div>--}}
{{--                                    </div>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                        {!! $setting->map?$setting->map : '' !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CONTACT -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>Bültenimize Ücretsiz Abone Olun!</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form action="{{route('add.sub')}}" method="post">
                                @csrf
                                <input type="text" required="" class="form-control rounded-0" name="subemail" placeholder="E-Posta Adresinizi Giriniz">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Abone Ol</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->


@endsection



@section('css')

@endsection




@section('js')

@endsection




