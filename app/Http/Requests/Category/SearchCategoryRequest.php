<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Message;
class SearchCategoryRequest extends FormRequest
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
            //
            'name' => 'nullable|string',
            'page' => 'nullable|integer',
            'page_size' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => Message::find(3),
        ];
    }
}
