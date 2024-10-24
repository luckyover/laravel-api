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
            'product_nm' => 'string|max:255',
            'category_id' => 'required|exists:categories,category_id|integer',
            'price' => 'required|numeric|min:0',
            'price_sub' => 'nullable|numeric|min:0',
            'qty_sell' => 'required|integer|min:0',
            'rating' => 'required|integer|between:1,5',
            'img.*.file' => 'required|file',
            'brand_id' => 'nullable|string',
            's_title' => 'nullable|string|max:255',
            's_slug' => 'nullable|string|max:255',
            'm_description' => 'nullable|string',
            'description' => 'nullable|string',
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
