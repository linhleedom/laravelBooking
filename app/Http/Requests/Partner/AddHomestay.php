<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class AddHomestay extends FormRequest
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
            //
            'name' =>'uniquie:Homestay,name'
        ];
    }

    public function messages()
    {
        return [
            //
            'name.uniquie' =>'Tên danh mục bị trùng!'
        ];
    }
}
