<?php

namespace App\Models;

use App\Models\Scopes\SlugScope;
use App\Traits\MetaFields;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\URL;

/**
 * Class Tag.
 *
 * @property string slug
 */
class Tag extends BaseModel
{
    use SlugScope, MetaFields;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image', 'description',
    ];

    /**
     * @return string
     */
    public function getPermLinkAttribute()
    {
        return URL::route('tag.show', ['slug' => $this->slug]);
    }

    /**
     * @return MorphToMany|null
     */
    public function posts(): ?MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * @return MorphOne|null
     */
    public function meta(): ?MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
