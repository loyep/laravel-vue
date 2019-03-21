<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return string
     */
    public function getPermLinkAttribute()
    {
        return route('category.show', ['slug' => $this->slug]);
    }
}
