<?php

namespace App\Providers;

use App\Services\AuthenticationService;
use App\Services\JokeService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        //  $this->app->bind(AuthenticationService::class, function ($app) {
        //     return new AuthenticationService(); 
        // });
        // $this->app->bind(JokeService::class, function ($app) {
        //     return new JokeService(); 
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
