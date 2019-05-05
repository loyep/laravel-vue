<?php

use App\Helpers\Helper;

if (!function_exists('get_menus')) {
    /**
     * get menus.
     *
     * @param string $name
     *
     * @return array
     */
    function get_menus($name = 'home')
    {
        return Helper::getMenus($name);
    }
}

if (!function_exists('get_option')) {
    /**
     * get option.
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return string|null
     */
    function get_option($name = '', $default = '')
    {
        return Helper::getOption($name, $default);
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
        return Helper::thumbnail($path, $size, $set);
    }
}

if (!function_exists('current_user')) {
    /**
     * get current user.
     *
     * @return \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    function current_user()
    {
        return Helper::currentUser();
    }
}

if (!function_exists('get_footer_year')) {
    function get_footer_year($year)
    {
        $current_year = intval(date('Y'));
        if (!empty($year)) {
            return $year == $current_year ? $current_year : $year.'-'.$current_year;
        }

        return $current_year;
    }
}

if (!function_exists('get_widget')) {
    /**
     * @param $slug
     *
     * @return mixed|null
     */
    function get_widget($slug)
    {
        return Helper::getWidget($slug);
    }
}
