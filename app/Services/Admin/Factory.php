<?php

namespace App\Services\Grace;

class Factory
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

    /**
     * The Grace version.
     *
     * @return string
     */
    public function version () {
        return self::VERSION;
    }

    /**
     * Title
     *
     * @return string
     */
    public function title()
    {
        $title = self::$metaTitle;
        if (!empty($title)) {
            return $title;
        }
        return config('admin.name');
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
