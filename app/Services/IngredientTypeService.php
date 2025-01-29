<?php

namespace App\Services;

use App\Models\IngredientType;
use Illuminate\Support\Facades\Auth;

class IngredientTypeService
{
    public function store(array $data): IngredientType
    {
        return IngredientType::create([
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'added_by'  =>  auth()->id(),
            'updated_by'    =>  auth()->id(),
        ]);
    }

    public function update(array $data, IngredientType $ingredientType): void
    {
        $ingredientType->update([
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'updated_by'    =>  auth()->id(),
        ]);
    }

    public function destroy(IngredientType $ingredientType): void
    {
        $ingredientType->delete();
    }
}