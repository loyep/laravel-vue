<?php

namespace App\Providers;

use App\Events\PrismServiceProviderRegistered;
use App\Http\Middleware\ServePrism;
use App\Prism\Prism;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     *
     * @throws BindingResolutionException
     */
    public function boot()
    {
        View::addNamespace('prism', resource_path('prism/views'));

        $this->app->make(HttpKernel::class)->pushMiddleware(ServePrism::class);

        Event::listen(PrismServiceProviderRegistered::class, function () {
            Route::middleware([])
                ->domain(config('prism.app.domain', null))
                ->group(function () {
                    Route::get(Prism::path(), 'App\Http\Controllers\Prism\PrismController@index')->name('prism.index');
                });
        });
    }
}
