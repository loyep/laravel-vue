<?php

namespace App\Models\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasComments
{
    /**
     * Get the comments for the model.
     *
     * @return MorphToMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
