<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryUpdateRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:191',
            'description' => 'required|string|min:2|max:1000',
            'image' => 'nullable|file|mimetypes:image/*',
            'category_id' => 'required',
            'language_id' => 'required'
        ];
    }
}
