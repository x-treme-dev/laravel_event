<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
         protected $listen = [
            ArticleCreated::class => [
                UpdateCategoryArticleCount::class,
            ],
            ArticleUpdated::class => [
                UpdateCategoryArticleCountOnUpdate::class,
            ],
        ];
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
