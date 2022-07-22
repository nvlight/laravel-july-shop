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
        $maxUploadImageSize = config('product.gallery.max_image_upload_size');
        return [
            'parent_id' => 'required|exists:products,id',
            //'image' => 'required|file|mimes:jpg,png,webp|',
            'image.0' => 'required|image|max:' . $maxUploadImageSize,
            'image.1' => 'image|max:' . $maxUploadImageSize,
            'image.2' => 'image|max:' . $maxUploadImageSize,
            'image.3' => 'image|max:' . $maxUploadImageSize,
            'image.4' => 'image|web:' . $maxUploadImageSize,
            'is_main' => 'nullable|integer|gte:0',
        ];
    }
}
