<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $categoryId = $this->route('category')->id;
        return [
            'name' => 'required|string|min:2|max:255',
            'slug' => 'required|string|alpha_dash|unique:categories,slug,' . $categoryId,
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
}
