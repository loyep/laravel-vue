<?php

namespace App\Support\Grace;

class Grace
{
    /**
     * @var string
     */
    protected static $metaTitle;
    /**
     * The Grace version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

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
