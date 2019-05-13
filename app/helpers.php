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
