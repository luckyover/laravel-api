<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Message;
class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_nm' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'logo_url' => 'nullable|url|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_slug' => 'nullable|string|max:255',
            'seo_image_alt' => 'nullable|string|max:255',

        ];
    }

    public function messages(): array
    {
        return [
            'required' => Message::find(3),
            'unique'  => Message::find(7),
        ];
    }
}
