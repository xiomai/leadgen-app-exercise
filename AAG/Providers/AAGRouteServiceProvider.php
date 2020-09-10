<?php

namespace AAG\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AAGRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'AAG\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    public function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../routes/web.php');
    }

    public function mapApiRoutes()
    {
        Route::middleware('api')
            ->prefix('api/v1')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../routes/api.php');
    }
}
