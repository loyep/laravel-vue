<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GraceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('grace.admin', function () {
            return $this->app->make(\App\Services\GraceAdmin::class);
        });
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
