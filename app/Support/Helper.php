<?php

namespace App\Support;

use App\Models\Setting;
use App\Models\User;
use App\Models\Widget;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Helper
{
    /**
     * @var array
     */
    protected static $widgets;

    /**
     * @var array
     */
    protected static $options;

    /**
     * Get Option.
     *
     * @param string $name
     * @param string $default
     * @param null $group
     *
     * @return mixed|string|null
     */
    public static function getOption($name = '', $default = '', $group = null)
    {
        if (!isset(self::$options)) {
            self::$options = Setting::cache(100)->where('group', $group)->get()->each(function ($option, $key) {
                $option->value = json_decode($option->value);
            })->keyBy('key')->toArray();
        }

        if (!empty($name) && !empty(self::$options[$name]) && !empty(self::$options[$name]['value'])) {
            return self::$options[$name]['value'];
        }

        return isset($default) ? $default : null;
    }

    /**
     * Get Menus.
     *
     * @param string $name
     *
     * @return array
     */
    public static function getMenus($name = 'home')
    {
        Log::info($name);

        return [];
    }

    /**
     * @return User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public static function currentUser()
    {
        if (Auth::check()) {
            return Auth::user();
        }
        static $user;
        if (!isset($user)) {
            $user = new User();
        }

        return $user;
    }

    /**
     * @param $slug
     *
     * @return mixed|null
     */
    public static function getWidget($slug)
    {
        if (!isset(self::$widgets)) {
            self::$widgets = Widget::cache(100)->where('show', true)->get()->each(function ($widget) {
                $widget->value = json_decode($widget->value);
            })->keyBy('slug')->toArray();
        }

        if (!empty($slug) && !empty(self::$widgets[$slug]) && !empty(self::$widgets[$slug]['value'])) {
            return self::$widgets[$slug]['value'];
        }
    }

    public static function getAvatar($email)
    {
        $size = 120;
        $hash = Str::length($email) === 32 && ctype_xdigit($email)
            ? Str::lower($email)
            : md5(Str::lower(trim($email)));

        $config = [
            'size' => $size,
        ];

        $url = Arr::pull($config, 'url', 'https://secure.gravatar.com/avatar');
        $query = http_build_query($config, null, '&', PHP_QUERY_RFC3986);

        return $url . '/' . $hash . ($query ? '?' . $query : '');
    }
}
