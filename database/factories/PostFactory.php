<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            "slug" => fake()->slug(),
            "picture" => fake()->url(),
            "shortContent" => fake()->text(),
            "content" => fake()->text(),
        ];
    }
}
