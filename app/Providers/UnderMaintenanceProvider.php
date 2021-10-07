<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UnderMaintenanceProvider extends ServiceProvider
{
    const REDIRECT_TO = '/maintenance';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
