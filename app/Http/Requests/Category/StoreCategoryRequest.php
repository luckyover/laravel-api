<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Message;
class StoreCategoryRequest extends FormRequest
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
            'category_id' => 'nullable',
            'category_nm' => 'required|string|max:100',
            's_slug' => 'required|string',
            'm_description' => 'nullable|string',
            's_title' => 'nullable|string',
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
