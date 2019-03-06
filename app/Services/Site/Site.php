<?php

namespace App\Services\Site;

use App\Support\Helper;

class Site
{
    /**
     * @var string
     */
    protected static $metaTitle;

    public function title()
    {
        $title = self::$metaTitle;
        if (!empty($title)) {
            return $title;
        }
        return config('app.name');
    }

    /**
     * @return mixed|null
     */
    public function footerInfo()
    {
        return Helper::getWidget('footer_info');
    }

    /**
     * Set Grace title.
     *
     * @param $title
     */
    public static function setTitle($title)
    {
        self::$metaTitle = $title;
    }
}
