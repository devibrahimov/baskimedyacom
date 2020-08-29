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
            'name.required'=>' Ürün adı alanını doldurmak zorunludur!',
            'description.required'=>'Ürün bilgisi alanını doldurmak zorunludur!',
            'metatitle.required'=>'SEO için Meta başlık alanını doldurmak zorunludur',
            'metadescription.required'=>'SEO için Meta açıklaması alanını doldurmak zorunludur!',
            'product_code.required'=>'Ürün kodu alanını doldurmak zorunludur!',
            'product_code.unique'=>'Bu ürün kodunu daha önce başka üründe girildi.Ürün kodu ürüne özgün olması gerek!',
            'stock.required'=>'Stock Bilgisini Seçmek zorunludur!',
            'category.required'=>'Ürün Kategorisin seçmek zorunludur!'
        ];
    }
}
