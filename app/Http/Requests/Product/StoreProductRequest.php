<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Message;
class StoreProductRequest extends FormRequest
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
            'product_id' => 'nullable',
            'category_id' => 'required|exists:categories,id|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'total_sales' => 'nullable|integer|min:0',
            'rating' => 'nullable|integer|between:1,5',
            'image_url' => 'nullable|string',
            'brands' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_slug' => 'nullable|string|max:255',
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
