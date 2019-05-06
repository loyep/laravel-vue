<?php

namespace App\Prism;

use Illuminate\Support\Facades\Route;

class PendingRouteRegistration
{
    /**
     * Indicates if the routes have been registered.
     *
     * @var bool
     */
    protected $registered = false;

    public function prefix()
    {
        return config('prism.api.path', 'prism-api');
    }

    /**
     * Register the Prism authentication routes.
     *
     * @return $this
     */
    public function withAuthenticationRoutes()
    {
        Route::namespace('App\Http\Controllers\Auth')
            ->domain(config('prism.admin.domain', null))
            ->prefix($this->prefix())
            ->middleware(['guest:api'])
            ->group(function () {
                Route::post('register', 'RegisterController@register')->name('register');
                Route::post('login', 'LoginController@login')->name('login');
            });

        return $this;
    }

    /**
     * Register the Prism password reset routes.
     *
     * @return $this
     */
    public function withPasswordResetRoutes()
    {
        Route::namespace('App\Http\Controllers\Auth')
            ->domain(config('prism.admin.domain', null))
            ->prefix($this->prefix())
            ->middleware(['guest:api'])
            ->group(function () {
                Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
            });

        return $this;
    }

    /**
     * Register the Prism routes.
     *
     * @return void
     */
    public function register()
    {
        $this->registered = true;

        Route::namespace('App\Http\Controllers\Auth')
            ->domain(config('prism.admin.domain', null))
            ->middleware(['auth:api'])
            ->prefix($this->prefix())
            ->group(function () {
                Route::post('logout', 'LoginController@logout')->name('logout');
            });
    }

    /**
     * Handle the object's destruction and register the router route.
     *
     * @return void
     */
    public function __destruct()
    {
        if (!$this->registered) {
            $this->register();
        }
    }
}
