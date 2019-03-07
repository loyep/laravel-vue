<?php

namespace App\Providers;

use App\Support\Helper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
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
     */
    public function boot()
    {
//        View::share('footer_info', Helper::getWidget('footer_info'));
        View::share('site_info', Helper::getOption('site_info'));
        View::share('current_user', current_user());
        View::composer('partials.footer', '\App\Http\ViewComposers\GraceComposer@footerCompose');
    }
}
