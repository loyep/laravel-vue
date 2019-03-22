<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\URL;

/**
 * Class Category
 *
 * @property string slug
 *
 * @package App\Models
 */
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
        return URL::route('category.show', ['slug' => $this->slug]);
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
