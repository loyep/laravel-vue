<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string name();
 * @method static string title();
 *
 * @see \App\Services\Prism\Factory
 */
class Prism extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'prism.app';
    }
}
