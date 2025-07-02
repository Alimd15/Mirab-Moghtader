<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'required|string|max:200',
            'password' => 'required|string|max:100|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The First Name field is required',
            'last_name.required' => 'The Last Name field is required',
            'phone_number.phone' => 'The format of the Phone Number is not valid',
            'password.confirmed' => 'Confirm Password and Password do not match',
            'password.required' => 'The Confirm Password field is required',
        ];
    }
} 