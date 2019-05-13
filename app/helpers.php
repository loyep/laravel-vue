<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('route_is')) {
    /**
     * route_is.
     *
     * @param string $expression
     *
     * @return bool
     */
    function route_is(string $expression)
    {
        return fnmatch($expression, Route::currentRouteName());
    }
}

if (!function_exists('route_is_not')) {
    /**
     * route_is_not.
     *
     * @param string $expression
     *
     * @return bool
     */
    function route_is_not(string $expression)
    {
        return !fnmatch($expression, Route::currentRouteName());
    }
}

if (!function_exists('thumbnail')) {
    /**
     * Thumbnail.
     *
     * @param $path
     * @param array  $size
     * @param string $et
     *
     * @return mixed|string|null
     */
    function thumbnail($path, $size = ['w' => 450, 'h' => 300], $set = 'small')
    {
        return $path;
    }
}
