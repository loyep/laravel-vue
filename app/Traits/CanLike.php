<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cookie;

/**
 * Trait CanLike
 * @package App\Traits
 */
trait CanLike
{
    /**
     * @return string
     */
    public function getLikeKey()
    {
        return md5('prism_like_'.__CLASS__.$this->getKey());
    }

    /**
     * @return array|string|null
     */
    public function isLiked()
    {
        return Cookie::get($this->getLikeKey());
    }
}
