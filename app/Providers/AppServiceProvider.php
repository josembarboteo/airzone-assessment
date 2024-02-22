<?php

namespace App\Providers;

use Airzone\Domain\Category\CategoryRepository;
use Airzone\Infraestructure\Persistence\EloquentCategoryRepository;
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
    }
}
