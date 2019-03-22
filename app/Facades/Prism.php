<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string name();
 * @method static string title();
 * @method static string markdown($text);
 * @method static void setShare(string $url, string $title = null, string $des = null, string $pic = null);
 * @method static void setTitle(string $title);
 *
 * @see \App\Services\Prism
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
