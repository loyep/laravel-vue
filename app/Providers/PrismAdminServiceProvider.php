<?php

namespace App\Providers;

use App\Facades\PrismAdmin;
use App\Prism\PrismApp;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PrismAdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('prism.app', function () {
            return $this->app->make(PrismApp::class);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutes();
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        $prefix = PrismAdmin::path();
        Route::get($prefix, '\App\Http\Controllers\Api\PrismController@index')->name('dashboard');
        Route::get($prefix.'/{any}', '\App\Http\Controllers\Api\PrismController@index')->where('any', '.*');

        $namespace = 'App\Http\Controllers\Api';
        Route::prefix('api')
            ->middleware('api')
            ->namespace($namespace)
            ->group(base_path('routes/admin.php'));
    }
}
