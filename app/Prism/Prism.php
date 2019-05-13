<?php

namespace App\Prism;

class Prism
{
    /**
     * Title of Prism.
     *
     * @var string|null
     */
    public static $title = null;

    /**
     * All of the registered Prism tool scripts.
     *
     * @var array
     */
    public static $scripts = [];

    /**
     * All of the registered Prism tool CSS.
     *
     * @var array
     */
    public static $styles = [];

    /**
     * The variables that should be made available on the Prism JavaScript object.
     *
     * @var array
     */
    public static $jsonVariables = [];

    /**
     * Indicates if Prism should register its migrations.
     *
     * @var bool
     */
    public static $runsMigrations = true;

    /**
     * Get the current Prism version.
     *
     * @return string
     */
    public static function version()
    {
        return '1.0.0';
    }

    /**
     * Get the app name utilized by Prism.
     *
     * @return string
     */
    public static function name()
    {
        return config('prism.app.name', 'Prism');
    }

    /**
     * Get the URI path prefix utilized by Prism.
     *
     * @return string
     */
    public static function path()
    {
        return config('prism.app.path', '/admin');
    }

    /**
     * Get the title by Prism.
     *
     * @return string
     */
    public static function title()
    {
        $title = static::name();

        return !empty(static::$title) ? (static::$title.' - '.$title) : $title;
    }
}
