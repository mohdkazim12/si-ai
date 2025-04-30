<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'number' => 'required|digits_between:10,15',
            'class' => 'required|integer',
            'section' => 'integer|nullable|string|max:50',
            'roll_number' => 'integer|nullable|max:5000',
            'profile_picture' => 'nullable|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email is already registered.',
        ];
    }
}
