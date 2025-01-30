<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $fillable = [
        'name',
        'ingredient_type_id',
        'remarks',
        'added_by',
        'updated_by',
    ];

    public static function getAllIngredient()
    {
        return self::all();
    }

    public function ingredientType()
    {
        return $this->belongsTo(IngredientType::class, 'ingredient_type_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
