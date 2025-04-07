<?php

namespace App\Providers;

use DB;
use Illuminate\Database\Eloquent\Model;
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
        // Prevent (N+1 query) Lazy Loading
        Model::shouldBeStrict(! $this->app->isProduction());

        // Prevent run some command in production
        DB::prohibitDestructiveCommands(! $this->app->isProduction());
    }
}
