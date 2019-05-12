<?php

namespace App\Providers;

use App\Prism\PendingRouteRegistration;
use App\Prism\Prism;
use Illuminate\Pagination\AbstractPaginator;
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
        $this->app->singleton('prism', function () {
            return $this->app->make(Prism::class);
        });

        $this->loadRoutes();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        AbstractPaginator::defaultView(config('prism.app.pagination', 'vendor.pagination'));
        View::addNamespace('prism', $this->app->basePath() . '/prism/resources/views');
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
        $register = new PendingRouteRegistration();
        $register->withAuthenticationRoutes()->withPasswordResetRoutes();
        $prefix = config('prism.admin.path');
        $namespace = '\App\Http\Controllers\Admin';

        Route::group([
            'namespace' => $namespace,
        ], function () use ($prefix) {
            Route::group([
                'prefix' => $prefix,
            ], function () use ($prefix) {
                Route::get('/', 'PrismController@index')->name('dashboard');
                Route::get('/{any}', 'PrismController@index')->where('any', '.*');
            });

            Route::prefix('prism-api')
                ->middleware('api')
                ->group(base_path('routes/admin.php'));
        });
    }
}
