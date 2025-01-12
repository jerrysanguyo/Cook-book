<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:250'],
            'user_name' => ['required', 'string', 'max:250', 'unique:users,user_name'],
            'email'     => ['required', 'string', 'email', 'max:250', 'unique:users,email'],
            'password'  => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
        ];
    }
}
