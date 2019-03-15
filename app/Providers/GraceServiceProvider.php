<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PrismServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('prism.admin', function () {
            return $this->app->make(\App\Services\PrismAdmin::class);
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
