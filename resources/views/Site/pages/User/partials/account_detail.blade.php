<div class="card">
    <div class="card-header">
        <h3> Kullanıcı Bilgileri</h3>
    </div>
    <div class="card-body">
        <p>bilgilerinizi buradan güncelleye bilirsiniz </p>
        <form action="{{route('user.accountchange')}}" role="form" method="post">

            <div class="row">

                <div class="col-md-12">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Ad <span class="required">*</span></label>
                            <input required=""  value="{{$user->name}}"   class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Soyad  <span class="required">*</span></label>
                            <input required=""  value="{{$user->surname}}"  class="form-control" name="surname">
                        </div>
                        <input type="hidden" name="uid" value="{{$user->user_id}}">
                        <input type="hidden" name="unfid" value="{{$user->id}}">
                        <div class="form-group col-md-6">
                            <label>Email Adresi <span class="required">*</span></label>
                            <input required=""  value="{{$user->email}}"  class="form-control" name="email" type="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label>TC kimlik no: <span class="required">*</span></label>
                           <h6> <i class="ti-lock"> </i> {{$user->tckimlik}}  </h6>
                        </div>
                        <div class="form-group col-md-6">
                            <label>il <span class="required">*</span></label>
                            <select class="form-control" name="province" id="province">
                                <option selected disabled>Bir il Seçin</option>
                                @foreach($provinces as $province)
                                    <option {{$province->id == $user->user_province? 'selected': ''}}  value="{{$province->province_no}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>ilçe <span class="required">*</span></label>
                            <select class="form-control" name="district" id="districts">
                                <option selected disabled>Bir ilçe Seçin</option>
                                {{--buraya veri ajax ile geliyor --}}
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>GSM <span class="required">*</span></label>
                            <h6> <i class="ti-lock"> </i> {{$user->gsm}}  </h6>
                        </div>
                        @csrf
                        <div class="form-group col-md-6">
                            <label>GSM 2  </label>
                            <input  class="form-control" value="{{$user->gsm2}}"  name="gsm2" type="number">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sabit Telefon </label>
                            <input   class="form-control"  value="{{$user->phone}}"  name="phone" type="number">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Sabit Telefon 2 </label>
                            <input  class="form-control"  value="{{$user->phone2}}"  name="phone2" type="number">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out" name="account_submit" > Bilgilerini Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
