<div class="card">
    <div class="card-header">
        <h3> Kullanıcı Bilgileri</h3>
    </div>
    <div class="card-body">
        <p>{{$user->name}} bilgilerinizi buradan güncelleye bilirsiniz </p>
        <form action="{{route('user.companychange')}}" role="form" method="post">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Firma adı <span class="required">*</span></label>
                            <input  value="{{$user->company_name?$user->company_name:''}}" class="form-control" name="company_name" type="text" >
                        </div>
                        <input type="hidden" name="uid" value="{{$user->user_id}}">
                        <div class="form-group col-md-12">
                            <label>Adres 1 <span class="required">*</span></label>
                            <input required=""  value="{{$user->address1?$user->address1:''}}"   class="form-control" name="address1" type="text">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Adres 2  <span class="required">*</span></label>
                            <input required=""  value="{{$user->address2?$user->address2:''}}"  class="form-control" name="address2">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Posta Kodu<span class="required">*</span></label>
                            <input required=""  value="{{$user->postcode?$user->postcode:''}}"  class="form-control" name="postcode" type="number">
                        </div>


                        <div class="form-group col-md-6">
                            <label>Vergi Dairesi <span class="required">*</span></label>
                            <input required=""  value="{{$user->vergidairesi?$user->vergidairesi:''}}"  class="form-control" name="vergidairesi" type="text">
                        </div>
                        @csrf
                        <div class="form-group col-md-6">
                            <label>Vergi Numarası  </label>
                            <input  class="form-control" value="{{$user->vergino?$user->vergino:''}}"  name="vergino" type="number">
                        </div>



                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out" name="corporative_submit" > Bilgilerini Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
