<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|string|between:2,255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer|gt:0',
            'age_start' => 'nullable|numeric|min:0|max:150|lt:age_end',
            'age_end' =>   'nullable|numeric|min:0|max:150|gt:age_start',
            'size' =>   'nullable|integer|min:0',
            'brand_id'   => 'nullable|integer|min:0',
            'country_id' => 'nullable|integer|min:0',
            'description' => 'nullable|string|min:5|max:65000',
        ];
    }
}
