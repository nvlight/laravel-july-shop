<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
            'parent_id' => 'required|exists:products,id',
            //'image' => 'required|file|mimes:jpg,png,webp|',
            'image.0' => 'required|image|max:5120',
            'image.1' => 'image|max:5120',
            'image.2' => 'image|max:5120',
            'image.3' => 'image|max:5120',
            'image.5' => 'image|max:5120',
            'is_main' => 'required',
        ];
    }
}
