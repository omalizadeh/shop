<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'slug' => 'nullable|string|alpha_dash|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id',
            'type' => 'required|integer|in:0,1'
        ];
    }
}
