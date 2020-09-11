<?php

namespace AAG;

use AAG\Providers\AAGRouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class AAGServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'AAG');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/aag.php', 'aag');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->app->register(AAGRouteServiceProvider::class);
    }
}
