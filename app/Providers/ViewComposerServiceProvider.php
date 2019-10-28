<?php

namespace App\Providers;

use App\Dawn\Support\ViewCache;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View as ViewContainer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        ViewContainer::composer('layouts.app', function (View $view) {
            $view->with('searchTop', $this->searchTop());
        });

//        ViewContainer::composer('layouts.user', function (View $view) {
//            $view->with('user', $this->currentUser());
//        });

        Blade::directive('cache', function ($expression) {
            if (Str::startsWith($expression, '(')) {
                $expression = Str::substr($expression, 1, -1);
            }

            return "<?php echo app()->make('viewcache')->cache(Arr::except(get_defined_vars(), ['__data', '__path']), {$expression}); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('viewcache', ViewCache::class);
    }

    /**
     * @return mixed
     */
    protected function searchTop()
    {
        return Cache::remember('search_top', 3600, function () {
            return Tag::take(8)->get();
        });
    }

    protected function currentUser()
    {
        $key = Str::lower('current user|' . request()->ip());
        return Cache::remember($key, 3600, function () {
            $authUser = Auth::user();
            $user = User::withCount(['articles', 'comments'])->find($authUser->id);
            return $user;
        });
    }
}
