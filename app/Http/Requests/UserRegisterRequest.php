<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:50',
            'surname'=>'required|string|max:50',
            'company_name'=>'required|string|max:50',
            'email'=>'required|email|max:50|unique:users',
            'passportid'=>'required|max:11|min:11|unique:users|numeric',
            'address1'=>'required|string',
            'address2'=>'required|string',
            
            'province'=>'required',
            'district'=>'required',
            
            'phone'=>'numeric',
            'phone2'=>'numeric',
            'gsm1'=>'required|numeric',
            'gsm2'=>'numeric',
            
            'postcode'=>'required|numeric',
            'vergino'=>'required|numeric',
            
            'vergidairesi'=>'required|string',
            
            'password'=>'required|string|min:8|max:30|confirmed',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'İsim alanı boş bırakılamaz!',
            'name.string'=> 'İsim alanı sadece metin içerebilir!',
            'name.max'=> 'İsim alanı maksimum 50 karakter içerebilir!',
            
            'surname.required'=> 'Soyisim alanı boş bırakılamaz!',
            'surname.string'=> 'Soyisim alanı sadece metin içerebilir!',
            'surname.max'=> 'Soyisim alanı maksimum 50 karakter içerebilir!',
            
            'company_name.required'=> 'Firma adı alanı boş bırakılamaz!',
            'company_name.string'=> 'Firma adı sadece metin içerebilir!',
            
            'email.required'=> 'Email alanı boş bırakılamaz!',
            'email.unique'=> 'Bu E-posta adresi zaten başka biri tarafından kullanılmış. E-posta adresinizi doğru yazdığınızdan emin olun.',
            
            'passportid.required'=> 'TC-KİMLİK NUMARANIZ alanı boş bırakılamaz!',
            'passportid.number'=> 'TC-KİMLİK NUMARANIZ alanı sadece rakam içerebilir!',
            'passportid.max'=> 'TC-KİMLİK NUMARANIZ alanı maksimum 11 karakter içerebilir!',            'passportid.min'=> 'TC-KİMLİK NUMARANIZ alanı 11 karakter içermelidir!',
            
            'address1.required'=> 'Adres 1 alanı boş bırakılamaz!',
            'address2.required'=> 'Adres 2 alanı boş bırakılamaz!',
            
            'province.required'=> 'İl alanı alanı boş bırakılamaz!',
            
            'district.required'=> 'İl alanı alanı boş bırakılamaz!',
            
            'gsm1.required'=> 'GSM alanı alanı boş bırakılamaz!',
            'gsm1.unique'=> 'Bu Telefon numarası daha önce başka birisi tarafından kullanılmış.Bir Telefon numarası birden fazla kullanılamaz ',
            'gsm1.number'=> 'GSM alanında + ve rakamlardan başka karakter kullanamazsınız!',
            
            'gsm2.number'=> 'GSM 2 alanında + ve rakamlardan başka karakter kullanamazsınız!',
            
            'phone.number'=> 'Sabit Telefon alanında + ve rakamlardan başka karakter kullanamazsınız!',
            
            'phone2.number'=> 'Sabit Telefon 2 alanında + ve rakamlardan başka karakter kullanamazsınız!',
            
            'postcode.number'=> 'Posta Kodu alanında sadece rakam kullanılabilir!',
            
            'vergino.number'=> 'Vergi Numarası alanında sadece rakam kullanılabilir!',
            'vergino.required'=> 'Vergi Numarası alanı alanı boş bırakılamaz!',
            
            
            'vergidairesi.string'=> 'Vergi Dairesi alanı sadece metin içerebilir!',
            'vergidairesi.required'=> 'Vergi Dairesi alanı alanı boş bırakılamaz!',
            
            
            
            'password.required'=>'Şifre alanı boş bırakılamaz',
            'password.confirmed'=>'Şifre doğrulamada hata! Lütfen şifreyi doğru bir şekilde tekrar giriniz.',
            'password.max'=> 'Şifre alanı maksimum 30 karakter içerebilir!',
            'password.min'=> 'Şifre alanı minimum 6 karakterden oluşmalıdır!!',
            
        ];
    }
}
