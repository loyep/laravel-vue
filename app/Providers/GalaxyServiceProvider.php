<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class GalaxyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('galaxy', function () {
            return new \App\Support\Galaxy();
        });
        
        $prefix = 'galaxy';
        Route::get($prefix, '\App\Http\Controllers\Admin\GalaxyController@index')->name('galaxy');
//        Route::get($prefix . '/login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('galaxy.login');
//        Route::get($prefix . '/register', '\App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('galaxy.register');
        Route::get($prefix . '/{any}', '\App\Http\Controllers\Admin\GalaxyController@index')->where('any', '.*');
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
