<?php

namespace App\Providers;

use App\Prism\Facades\PrismAdmin;
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
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/admin.php'));
        });
    }
}
