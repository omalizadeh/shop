<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $brandId = $this->route('brand')->id;
        return [
            'name' => 'required|string|min:2|max:255',
            'slug' => 'nullable|string|alpha_dash|unique:brands,slug,' . $brandId
        ];
    }
}
