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
            'name.required'=>'Firma adı alanı boş bırakılamaz!Bilgileri yeniden girin',
            'name.string'=>'Firma adı alanı sadece yazı tipi ala bilir.Yeniden doğru bilgiler girin!',
            'name.max'=>'Firma adı alanı 150 karakterden fazla olmalalıdır.boşluklarda karakter olaraq sayılır',
            "metatitle.string"=>"Meta title alanı sadece yazı tipi ala bilir.Yeniden doğru bilgiler girin!",
            "metatitle.required"=>"Meta title alanı boş bırakılamaz!Bilgileri yeniden girin.Bu alan SEO için önemlidir.",
            "metatitle.max"=>"Meta Title alanı en fazla 200 karakter almaktadır",
            "metadescription.required"=>"Meta Description alanı boş bırakılamaz!Bilgileri yeniden girin.Bu alan SEO için önemlidir.",
            "email.required" => "",
            "email.email"=> " ",
            "email.max"=>"email max",
            "website.required"=>"",
            "website.URL"=>"",
            'number.required'=>'',
            'number.numeric'=>'',
            'fax.required'=>'',
            'fax.numeric'=>'',
            'phone.required'=>'',
            'phone.numeric'=>'',
            'address.required'=>'',
            'address.string'=>'',
            'address.max'=>'',
            'map.required'=>'map required',
            'map.string'=>'map string',
            'facebook.required'=>'',
            'facebook.URL'=>'',
            'instagram.required'=>'',
            'instagram.URL'=>'',
            'youtube.required'=>'',
            'youtube.URL'=>'',
            'about.required'=>'',
            'about.string'=>'',
            'about.max'=>'',

        ];
    }

}
