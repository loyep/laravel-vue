<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if (!function_exists('getAvatar')) {
    /**
     * @param $email
     *
     * @return string
     */
    function getAvatar($email)
    {
        $hash = Str::length($email) === 32 && ctype_xdigit($email)
            ? Str::lower($email)
            : md5(Str::lower(trim($email)));
        $config = [
            'size' => 96,
            'd'    => 'mm',
            'r'    => 'g',
        ];
        $url = Arr::pull($config, 'url', 'https://secure.gravatar.com/avatar');
        $query = http_build_query($config, '', '&', PHP_QUERY_RFC3986);
        return $url . '/' . $hash . ($query ? '?' . $query : '');
    }
}

if (!function_exists('routeIs')) {
    /**
     * route_is.
     *
     * @param string $expression
     *
     * @return bool
     */
    function routeIs(string $expression)
    {
        return fnmatch($expression, Route::currentRouteName());
    }
}

if (!function_exists('routeIsNot')) {
    /**
     * route_is_not.
     *
     * @param string $expression
     *
     * @return bool
     */
    function routeIsNot(string $expression)
    {
        return !fnmatch($expression, Route::currentRouteName());
    }
}


if (!function_exists('cdnImage')) {
    /**
     * @param string $path
     *
     * @return bool
     */
    function cdnImage(string $path)
    {
        return $path;
    }
}
