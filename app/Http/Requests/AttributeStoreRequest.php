<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'value' => 'required|string|min:2|max:255',
            'color' => 'nullable|regex:/#[a-fA-F0-9]{6}/'
        ];
    }
}
