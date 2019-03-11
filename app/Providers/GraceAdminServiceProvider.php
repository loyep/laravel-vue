<?php

namespace App\Providers;

use App\Facades\GraceAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class GraceAdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('grace.app', function () {
            return $this->app->make(\App\Services\Grace::class);
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
        $prefix = GraceAdmin::path();
        Route::get($prefix, '\App\Http\Controllers\Admin\GraceController@index')->name('dashboard');
        Route::get($prefix . '/{any}', '\App\Http\Controllers\Admin\GraceController@index')->where('any', '.*');

        $namespace = 'App\Http\Controllers';
        Route::prefix('api')
            ->middleware('api')
            ->namespace($namespace)
            ->group(base_path('routes/admin.php'));
    }
}
