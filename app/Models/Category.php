<?php

namespace App\Models;

use App\Models\Scopes\SlugScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\URL;

/**
 * Class Category.
 *
 * @property string slug
 */
class Category extends Model
{
    use SlugScope;

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
