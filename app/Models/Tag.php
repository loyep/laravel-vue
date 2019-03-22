<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\URL;

/**
 * Class Tag
 *
 * @property string slug
 *
 * @package App\Models
 */
class Tag extends Model
{

    /**
     * @return string
     */
    public function getPermLinkAttribute()
    {
        return URL::route('tag.show', ['slug' => $this->slug]);
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
