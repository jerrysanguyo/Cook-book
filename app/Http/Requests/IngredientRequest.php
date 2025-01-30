<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name'  =>  ['required', 'string', 'max:255'],
            'remarks'  =>  ['nullable', 'string', 'max:255'],
            'ingredient_type_id' =>  ['required', 'integer', 'exists:ingredient_types,id'],
        ];
    }
}
