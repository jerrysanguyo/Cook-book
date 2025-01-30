<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'full_name',
        'user_name',
        'email',
        'password',
        'email_verified_at', 
        'is_verified'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getAllUser()
    {
        return self::all();
    }

    public static function getUser($user)
    {
        return self::where('id', $user)->first();
    }

    public function profilePictureUser()
    {
        return $this->hasOne(Picture::class, 'added_by')->where('remarks', 'profile');
    }

    public function picturesAddedBy()
    {
        return $this->hasMany(Picture::class, 'added_by');
    }

    public function pictureUpdatedBy()
    {
        return $this->hasMany(Picture::class, 'updated_by');
    }

    public function ingredientTypesAddedBy()
    {
        return $this->hasMany(IngredientType::class, 'added_by');
    }

    public function ingredientTypeUpdatedBy()
    {
        return $this->hasMany(IngredientType::class, 'updated_by');
    }

    public function ingredientAddedBy()
    {
        return $this->hasMany(Ingredient::class, 'added_by');
    }

    public function ingredientUpdatedBy()
    {
        return $this->hasMany(Ingredient::class, 'updated_by');
    }
}
