<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'book_id' => $this->whenLoaded('book'),
            'user_id' => $this->whenLoaded('user'),
            'loan_date' => $this->loan_date,
            'return_date' => $this->return_date,
            'status' => $this->status,
        ];
    }
}
