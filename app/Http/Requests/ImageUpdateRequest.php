<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUpdateRequest extends FormRequest
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
            'about_banner' => 'nullable|file|mimetypes:image/*',
            'gallery_banner' => 'nullable|file|mimetypes:image/*',
            'activity_banner' => 'nullable|file|mimetypes:image/*',
            'contact_banner' => 'nullable|file|mimetypes:image/*'
        ];
    }
}
