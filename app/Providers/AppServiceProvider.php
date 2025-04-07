<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
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

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->circular()
                ->locales(['vi', 'en'])
                ->labels([
                    'vi' => 'Vietnamese (VI)',
                    'en' => 'English (EN)',
                ])
                ->displayLocale('vi')
                ->visible(outsidePanels: true);
            // ->outsidePanelPlacement(Placement::BottomRight); // also accepts a closure
        });
    }
}
