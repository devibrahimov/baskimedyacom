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
            'email'=>'required|email|max:50|unique:users',
            'phone'=>'required|numeric',
            'password'=>'required|string|max:80|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'İsim Alanını Boş Bırakılamaz!',
            'name.string'=> 'İsim Alanında Hatalı Bilgi Girdiniz!',
            'name.max'=> 'Maksimum 50 Karakter Girilebilir!',
            'email.required'=> 'Email Alanını Boş Bırakamazsınız! ',
            'phone.unique'=> 'Bu Telefon Numarası Daha Önce Kullanıldı.Bir Telefon Numarası Tekrar Kullanılamaz ',
            'phone.number'=> 'Geçerli Bir Telefon Nummarası Giriniz!',
            'email.unique'=> 'Bu Email Adresi ile Kullanıcı Kaydı Tespit Edildi. Email Adresinizi Doğru Yazdığınızdan Emin Olun.',
            'password.required'=>'Şifre Alanı Gereklidir. Boş bırakamazsınız',
            'password.confirmed'=>'Şifreler Eşleştirilemedi. Tekrar Deneyiniz!',
        ];
    }
}
