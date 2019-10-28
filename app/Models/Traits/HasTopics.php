<?php

namespace App\Models\Traits;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasTopics
{
    /**
     * Get the tags for the model.
     *
     * @return MorphToMany
     */
    public function topics(): MorphToMany
    {
        return $this->morphToMany(Topic::class, 'topicable');
    }
}
