<?php

namespace App\Models\Traits;

use App\Models\Tag;

trait HasTags
{
    /**
     * Get the tags for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
}
