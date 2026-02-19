<?php

namespace App\Models;

use App\Models\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'loan_date',
        'return_date',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'status' => StatusEnum::class,
        ];
    }

     public function boock(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
