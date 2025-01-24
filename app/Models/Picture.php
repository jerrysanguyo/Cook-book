<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'pictures';
    protected $fillable = [
        'name',
        'path',
        'remarks',
        'added_by',
        'updated_by',
    ];

    public static function profilePicture($user)
    {
        return self::where('added_by', $user)->where('remarks', 'profile')->first();
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
