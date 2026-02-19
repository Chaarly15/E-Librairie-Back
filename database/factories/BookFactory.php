<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => Author::random() ?: Author::factory(),
            'category_id' =>  Category::random() ?: Category::factory(),
            'title' => fake()->title(),
            'summary' => fake()->sentence(),
            'copy_number' => fake()->numberBetween(0, 100)
        ];
    }
}
