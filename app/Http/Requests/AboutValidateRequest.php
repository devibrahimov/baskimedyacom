<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutValidateRequest extends FormRequest
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
            'header' =>'required|string|max:150',
            'content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'header.required'=>'Bu Alan Boş Bırakılamaz!',
            'header.string'=>'Bu Alan Boş Bırakılamaz!',
            'header.max'=>'150 Karakter Limiti Aşıldı! Boşluklar da bir karakterdir.',
            'content.required'=>'Bu Alan Boş Bırakılamaz!',
        ];
    }



}
