<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

     protected $fillable = [
        'label',
        'description',
    ];

     public static function random()
    {
        return static::inRandomOrder()->first();
    }

     public function boocks(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
