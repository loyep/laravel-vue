<?php

namespace App\Models\Traits;

use App\Models\Content;
use App\Models\Post;

trait HasPosts
{
    /**
     * Get the content for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
