<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string name();
 * @method static string title();
 *
 * @see \App\Services\Grace\Factory
 */
class Grace extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'grace';
    }

    /**
     * Admin path
     *
     * @return string
     */
    public static function path()
    {
        return config('admin.path', '/grace');
    }
}
