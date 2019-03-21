<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

trait CanLike
{
    public function getLikeKey()
    {
        return md5('prism_like_' . __CLASS__ . $this->getKey());
    }

    public function isLiked()
    {
        return Cookie::get($this->getLikeKey());
    }
}
