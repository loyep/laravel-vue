<?php

namespace Loyep\Prism\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string name();
 * @method static string title();
 *
 * @see \App\Services\Factory
 */
class PrismAdmin extends Facade
{
    /**
     * Admin path.
     *
     * @return string
     */
    public static function path()
    {
        return config('admin.path', '/prism');
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'prism.admin';
    }
}
