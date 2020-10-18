<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeUpdateRequest extends FormRequest
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
        'title_one' => 'required|string|min:2|max:191',
        'title_two' => 'required|string|min:2|max:191',
        'title_three' => 'required|string|min:2|max:191',
        'image' => 'required|file|mimetypes:image/*',
        'lang' => 'required|string'
        ];
    }
}
