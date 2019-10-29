<?php

namespace App\Models\Traits;

use App\Models\Comment;

trait HasComments
{
    /**
     * Get the comments for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
