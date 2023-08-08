<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orbit\Drivers\Json;
use Orbit\Facades\Orbit;

class OrbitServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Orbit::extend('json', function ($app) {
            return new Json($app);
        });
    }
}
