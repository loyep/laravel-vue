<?php

namespace App\Services;

class Galaxy
{
    /**
     * @var string
     */
    protected static $metaTitle;
    /**
     * The Galaxy version.
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
     * Set Galaxy title.
     *
     * @param $title
     */
    public static function setTitle($title)
    {
        self::$metaTitle = $title;
    }
}
