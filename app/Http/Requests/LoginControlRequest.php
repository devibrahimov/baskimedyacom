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
            'email.required'=>'email alanını boş bırakamazsınız',
            'email.email'=>'hatalı email bilgisi girdiniz.Lütfen kontrol edin ve yeniden deneyin',
            "email.max" => "girdiyiniz veri 30 karakterden fazla olamaz.",
            "passwd.required"=>"Şifre alanı boş bırakılamaz.",
            'passwd.string'=>'Şifre alanına girdiyiniz veri metin tipi değildir. '
        ];
    }
}
