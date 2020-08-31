<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidateRequest extends FormRequest
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
            'name'=>'required|string|max:250',
            'description'=>'required|string|max:650',
            'metatitle'=>'required|string|max:150',
            'metadescription'=>'required|string|max:150',
            'product_code'=>'required|string|unique:products|',
            'stock'=>'required|boolean',
            'category'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>' Ürün Adı Boş Bırakılamaz!',
            'description.required'=>'Ürün Bilgisi Alanını Doldurmak Zorunludur!',
            'metatitle.required'=>'SEO İçin Meta Başlık Alanını Doldurmak Zorunludur',
            'metadescription.required'=>'SEO İçin Meta Açıklaması Alanını Doldurmak Zorunludur!',
            'product_code.required'=>'Ürün Kodu Alanını Doldurmak Zorunludur!',
            'product_code.unique'=>'Bu Ürün Kodu Daha Önce Başka Üründe Girildi. Ürün Kodu Ürüne Özgün Olması Gerek!',
            'stock.required'=>'Stok Bilgisini Seçmek Zorunludur!',
            'category.required'=>'Ürün Kategorisini Seçmek Zorunludur!'
        ];
    }
}
