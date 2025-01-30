<?php

namespace App\Services;

use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;

class IngredientService
{
    public function store(array $data): Ingredient
    {
        return Ingredient::create([
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'ingredient_type_id' =>  $data['ingredient_type_id'],
            'added_by'  =>  auth()->id(),
            'updated_by'  =>  auth()->id(),
        ]);
    }

    public function update(array $data, Ingredient $ingredient): void
    {
        $ingredient->update([
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'ingredient_type_id' =>  $data['ingredient_type_id'],
            'updated_by'  =>  auth()->id(),
        ]);
    }

    public function destroy(Ingredient $ingredient):void
    {
        $ingredient->delete();
    }
}