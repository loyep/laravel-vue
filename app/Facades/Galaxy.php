<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Galaxy extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'galaxy';
    }

    /**
     * Admin path
     *
     * @return string
     */
    public static function path()
    {
        return config('admin.path', '/galaxy');
    }
}
