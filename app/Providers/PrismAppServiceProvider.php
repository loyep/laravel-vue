<?php

namespace App\Providers;

use App\Prism\PrismAdmin;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\Blade;
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
        AbstractPaginator::defaultView('vendor.pagination');

        Blade::include('layouts.partials.footer', 'footer');
        Blade::include('layouts.partials.header', 'header');

        // @routeis
        Blade::directive('routeis', function ($expression) {
            return "<?php if (fnmatch({$expression}, Route::currentRouteName())) : ?>";
        });
        Blade::directive('endrouteis', function ($expression) {
            return '<?php endif; ?>';
        });
        Blade::directive('routeisnot', function ($expression) {
            return "<?php if (! fnmatch({$expression}, Route::currentRouteName())) : ?>";
        });
        Blade::directive('endrouteisnot', function ($expression) {
            return '<?php endif; ?>';
        });

    }

    public function registerBladeDirectives()
    {
        $directives = require __DIR__.'/directives.php';
    }
}
