<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'biographie',
    ];

    public static function random(): Model
    {
        return static::inRandomOrder()->first();
    }

    public function boocks(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
