<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author' => $this->whenLoaded('author'),
            'category' => $this->whenLoaded('category'),
            'title' => $this->title,
            'summary' => $this->summary,
            'copy_number' => $this->copy_number,
            'created_at' => $this->created_at,
            'created_at_label' => $this->created_at->diffForHumans(),
        ];
    }
}
