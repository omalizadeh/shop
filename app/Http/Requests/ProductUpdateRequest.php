<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'nullable|exists:brands,id',
            'images' => 'nullable|array',
            'images.*' => 'file|image',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'default_category_id' => 'required|exists:categories,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'barcode' => 'nullable|alpha_dash',
            'insta_link' => 'nullable|url',
            'stock' => 'required|integer|gte:0',
            'price' => 'required|integer|gte:0',
            'weight' => 'nullable|numeric|between:0.001,999.999',
            'on_sale' => 'required|in:0,1'
        ];
    }
}
