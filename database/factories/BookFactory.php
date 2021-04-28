<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'publishing' => $this->faker->company,
            'publish_date' => $this->faker->date(),
            'description' => $this->faker->text,
        ];
    }
}
