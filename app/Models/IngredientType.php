<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientType extends Model
{
    use HasFactory;

    protected $table = 'ingredient_types';
    protected $fillable = [
        'name',
        'remarks',
        'added_by',
        'updated_by'
    ];

    public static function getAllIngredientType()
    {
        return self::all();
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
