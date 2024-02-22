<?php

namespace App\Providers;

use Airzone\Domain\Category\CategoryRepository;
use Airzone\Domain\Post\PostsRepository;
use Airzone\Infraestructure\Persistence\EloquentCategoryRepository;
use Airzone\Infraestructure\Persistence\EloquentPostsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(CategoryRepository::class, fn(Application $app) => new EloquentCategoryRepository());
        $this->app->singleton(PostsRepository::class, fn(Application $app) => new EloquentPostsRepository());
    }
}
