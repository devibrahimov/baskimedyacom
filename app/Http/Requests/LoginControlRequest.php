<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginControlRequest extends FormRequest
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
            'email' =>'required|email|max:50',
            'passwd'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Email Alanını Boş Bırakamazsınız',
            'email.email'=>'Hatalı E-Posta Bilgisi Girdiniz. Lütfen Kontrol Edin ve Yeniden Deneyin',
            "email.max" => "Girdiyiniz Yeri 30 Karakterden Fazla Olamaz.",
            "passwd.required"=>"Şifre Alanı Boş Bırakılamaz.",
            'passwd.string'=>'Geçerli Bir Şifre Giriniz!'
        ];
    }
}
