<?php

namespace App\Prism;

class PrismAdmin
{
    /**
     * The PrismApp version.
     *
     * @var string
     */
    const VERSION = '1.0.0';
    /**
     * @var string
     */
    protected static $metaTitle;

    /**
     * Set PrismApp title.
     *
     * @param string $title
     */
    public static function setTitle(string $title)
    {
        self::$metaTitle = $title;
    }

    /**
     * The PrismApp version.
     *
     * @return string
     */
    public function version()
    {
        return self::VERSION;
    }

    /**
     * Title.
     *
     * @return string
     */
    public function title()
    {
        $title = self::$metaTitle;
        if ($title && !empty($title)) {
            return $title;
        }

        return config('admin.name');
    }
}
