<?php

namespace Database\Factories;

use Airzone\Domain\Category\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->slug(),
        ];
    }
}
