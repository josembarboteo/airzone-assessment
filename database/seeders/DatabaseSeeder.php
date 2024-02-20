<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Airzone\Domain\Category\Category;
use Airzone\Domain\Comment\Comment;
use Airzone\Domain\Post\Post;
use Airzone\Domain\User\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Comment::factory(10)->create();
        Post::factory(5)->create();
        Category::factory(5)->create();
    }
}
