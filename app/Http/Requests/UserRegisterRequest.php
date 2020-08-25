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
            'name.required'=> 'İsim alanını boş bırakamazsınız!',
            'name.string'=> 'İsim alanında hatalı bilgi girdiniz!',
            'name.max'=> 'İsim alanında gereyinden Fazla karakter girdiniz.Maksimum 50!',
            'email.required'=> 'Email alanını boş bırakamazsınız! ',
            'phone.unique'=> 'bu Telefon numarası daha önce kullanıldı.Bir Telefon numarası tekrar kullanılamaz ',
            'phone.number'=> 'Telefon alanında + ve rakamlardan başka karakter kullanamazsınız!',
            'email.unique'=> 'bu Email adresi ile kullanıcı kaydı tespit edildi.Email adresinizi doğru yazdığınızdan emin olun.',
            'password.required'=>'Şifre alanı gereklidir.Boş bırakamazsınız',
            'password.confirmed'=>'Şifreler eşleştirilemedi lütfen Şifreyi tekrar girerken doğru girdiyinizden emin olun',
        ];
    }
}
