<?php

namespace Database\Factories;

use Airzone\Domain\Comment\Comment;
use Airzone\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'content' => fake()->text(),
            'owner' => User::factory(),
        ];
    }
}
