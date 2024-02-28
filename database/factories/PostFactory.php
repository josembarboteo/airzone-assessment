<?php

namespace Database\Factories;

use Airzone\Domain\Comment\Comment;
use Airzone\Domain\Post\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            "slug" => fake()->slug(),
            "picture" => fake()->url(),
            "shortContent" => fake()->text(),
            "content" => fake()->text(),
            "comments" => Comment::factory(),
        ];
    }
}
