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
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users',
            // 'password' => 'required|string|min:6'
                        'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter valid email',
            // 'email.email' => 'Please enter valid email',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters'
        ];
    }
}