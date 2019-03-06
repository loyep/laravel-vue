<?php

namespace App\Support;

use App\Models\Setting;
use App\Models\User;
use App\Models\Widget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
     * Get Option
     *
     * @param string $name
     * @param string $default
     * @param null $group
     * @return mixed|string|null
     */
    public static function getOption($name = '', $default = '', $group = null)
    {
        if (!isset(self::$options)) {
            self::$options = Cache::remember('site.options', 10, function () use ($group) {
                return Setting::where('group', $group)->get()->each(function ($option, $key) {
                    $option->value = json_decode($option->value);
                })->keyBy('key')->toArray();
            });
        }

        if (!empty($name) && !empty(self::$options[$name]) && !empty(self::$options[$name]['value'])) {
            return self::$options[$name]['value'];
        }

        return (!empty($default)) ? $default : null;
    }

    /**
     * Get Menus
     *
     * @param string $name
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
     * @return mixed|null
     */
    public static function getWidget($slug)
    {
        if (!isset(self::$widgets)) {
            self::$widgets = Cache::remember('site.widgets', 10, function () {
                return Widget::where('show', true)->get()->each(function ($widget) {
                    $widget->value = json_decode($widget->value);
                })->keyBy('slug')->toArray();
            });
        }

        if (!empty($slug) && !empty(self::$widgets[$slug]) && !empty(self::$widgets[$slug]['value'])) {
            return self::$widgets[$slug]['value'];
        }

        return null;
    }
}
