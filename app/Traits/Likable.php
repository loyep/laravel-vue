<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cookie;

trait Likable
{
    public function getLikeKey()
    {
        return md5('prism_like_'.__CLASS__.$this->getKey());
    }

    public function isLiked()
    {
        return Cookie::get($this->getLikeKey());
    }
}
