<div class="card">
    <div class="card-header">
        <h3>Kullanıcı Şifre güncelleme sayfası</h3>
    </div>
    <div class="card-body">
        <p>Şifre güncellemek için önce eski şifrenizi girin. <a href="#">Log in instead!</a></p>

        <form method="post" action="{{route('password.change')}}" role="form" method="post">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-4 col-sm-12  ">
                            <label>Şifreniz<span class="required">*</span></label>
                            <input required="" class="form-control" name="password" type="password">
                        </div>
                        <div class="form-group col-md-6  col-lg-4 col-sm-12 ">
                            <label>Yeni Şifre <span class="required">*</span></label>
                            <input required="" class="form-control"  minlength="6" maxlength="100" name="newpassword" type="password">
                        </div>
                        @csrf
                        <input type="hidden" name="uid" value="{{\Illuminate\Support\Facades\Crypt::encrypt(Auth::user()->id)}}">
                        <div class="form-group col-md-6  col-lg-4 col-sm-12 ">
                            <label>Şifreyi Tekrar Girin<span class="required">*</span></label>
                            <input required="" class="form-control" minlength="6" maxlength="100" name="newpassword_confirmation" type="password">
                        </div>
                        <p>Şifrizi unutduysanız Yönetici ile iletişime geçiniz </p>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out" name="change_password" value="Submit"> Şifreni Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

