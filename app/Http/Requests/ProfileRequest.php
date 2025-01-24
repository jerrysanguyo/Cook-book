<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', 'max:255', 'unique:users,user_name,' . auth()->id()],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }
}
