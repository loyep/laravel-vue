<?php

namespace App\Support;

use App\Models\Setting;
use App\Models\User;
use App\Models\Widget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Helper
{

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
        $option = Setting::where('key', $name)->where('group', $group)->first();

        if (!empty($name) && !empty($option->value)) {
            return json_decode($option->value);
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
        $widget = Widget::where('slug', $slug)->where('show', true)->first();
        Log::info('slug:' . $slug);
        if (!empty($slug) && !empty($widget->value)) {
            return json_decode($widget->value);
        }

        return (!empty($default)) ? $default : null;
    }
}
