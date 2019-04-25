<?php

namespace App\Providers;

use App\Prism\PrismAdmin;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\ServiceProvider;

class PrismAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        AbstractPaginator::defaultView('vendor.pagination');

        $this->app->singleton('prism.admin', function () {
            return $this->app->make(PrismAdmin::class);
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
