<?php

namespace Database\Factories;

use Airzone\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'fullName' => fake()->name(),
        ];
    }
}
