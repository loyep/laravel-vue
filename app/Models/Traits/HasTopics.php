<?php

namespace App\Models\Traits;

use App\Models\Topic;

trait HasTopics
{
    /**
     * Get the tags for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'post_topics');
    }
}
