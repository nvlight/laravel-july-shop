<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' => 'required|integer|gt:0',
            'title' => 'required|string|between:2,255',
            'price' => 'required|numeric|min:0',
            'old_price' => 'required|numeric|min:0',
            'description' => 'nullable|string|min:5|max:65000',
        ];
    }
}
