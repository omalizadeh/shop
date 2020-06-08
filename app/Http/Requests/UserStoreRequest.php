<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|in:1,2,3',
            'national_id' => 'nullable|numeric|digits:10',
            'birth_date' => 'nullable|date',
            'mobile' => 'required|numeric|digits:11|unique:users,mobile',
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
