<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

/**
 * Trait CanLike.
 */
trait Likable
{
    /**
     * @var null|Collection
     */
    private static $_liked;

    /**
     * @return string
     */
    public function getLikeKey()
    {
        return md5('prism_like_' . self::class);
    }

    /**
     * @return array|string|null
     */
    public function isLiked()
    {
        if (is_null(self::$_liked)) {
            self::$_liked = collect(explode(',', Cookie::get($this->getLikeKey())))->filter(function ($item) {
                return !empty($item);
            })->map(function ($item) {
                return (int)$item;
            });
        }
        return self::$_liked->some($this->id);
    }

    public function like()
    {
        if ($this->isLiked()) {
            self::$_liked = self::$_liked->filter(function ($value) {
                return $this->id !== $value;
            });
            $this->decrement('likes');
        } else {
            self::$_liked->push($this->id);
            $this->increment('likes');
        }
        $this->save();
        Cookie::queue($this->getLikeKey(), self::$_liked->implode(','));
        return $this->likes;
    }
}
