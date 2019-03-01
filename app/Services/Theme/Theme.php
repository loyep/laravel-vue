<?php

namespace App\Services\Grace;

class Theme
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
     * Set Grace title.
     *
     * @param $title
     */
    public static function setTitle($title)
    {
        self::$metaTitle = $title;
    }
}
