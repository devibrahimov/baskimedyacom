<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingValidate extends FormRequest
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
            'name' =>'required|string|max:150',
            'slogan'=>'required|string|max:200',
            'metatitle'=>'required|string|max:200',
            'metadescription'=>'required|string|max:200',
            'email'=>'required|email|max:200',
            'website'=>'required|URL',
            'number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'fax'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address'=>'required|string|max:100',
            'map'=>'required|string',
            'facebook'=>'required|URL',
            'instagram'=>'required|URL',
            'youtube'=>'required|URL',
            'about'=>'required|string|max:250',

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Firma Adı Alanı Boş Bırakılamaz! Bilgileri Yeniden Girin',
            'name.string'=>'Firma Adı Sadece Yazı Olabilir!',
            'name.max'=>'Firma Adı Alanı 150 Karakterden Fazla Olamaz',
            "metatitle.string"=>"Meta Title Alanı Sadece Yazı Tipi Alabilir.Yeniden Bilgiler Girin!",
            "metatitle.required"=>"Meta Title Alanı Boş Bırakılamaz! Bu Alan SEO İçin Önemlidir.",
            "metatitle.max"=>"Meta Title Alanı En Fazla 200 Karakter Almaktadır",
            "metadescription.required"=>"Meta Description Alanı Boş Bırakılamaz! Bu alan SEO için önemlidir.",
            "email.required" => "E-Posta Alanı Gereklidir!",
            "email.email"=> " Geçerli Bir E-Posta Giriniz! ",
            "email.max"=>"email max",
            "website.required"=>"Bu Alan Boş Bırakılamaz!",
            "website.URL"=>"Geçerli bir URL Giriniz'",
            'number.required'=>'Bu Alan Boş Bırakılamaz!',
            'number.numeric'=>'Lütfen Sayı Giriniz!',
            'fax.required'=>'Bu Alan Boş Bırakılamaz!',
            'fax.numeric'=>'Fax Numarası Sayı Olmalıdır!',
            'phone.required'=>'Bu Alan Boş Bırakılamaz!',
            'phone.numeric'=>'Telefon Numarası Sayı Olmalıdır!',
            'address.required'=>'Bu Alan Boş Bırakılamaz!',
            'address.string'=>'Geçerli Bir Adres Giriniz!',
            'address.max'=>'',
            'map.required'=>'Bu Alan Boş Bırakılamaz!',
            'map.string'=>'Geçerli Bir Harita Adresi Giriniz!',
            'facebook.required'=>'Bu Alan Boş Bırakılamaz!',
            'facebook.URL'=>'Geçerli Bir Facebook Adresi Giriniz!',
            'instagram.required'=>'Bu Alan Boş Bırakılamaz!',
            'instagram.URL'=>'Geçerli Bir Instagram Adresi Giriniz!',
            'youtube.required'=>'Bu Alan Boş Bırakılamaz!',
            'youtube.URL'=>'Geçerli Bir YouTube Adresi Giriniz!',
            'about.required'=>'Bu Alan Boş Bırakılamaz!',
            'about.string'=>'Geçerli Bir Hakkında Alanı Giriniz!',
            'about.max'=>'',

        ];
    }

}
