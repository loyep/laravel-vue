<?php

namespace Loyep\Prism\Support;

class PrismAdmin
{
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
