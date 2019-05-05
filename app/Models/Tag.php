<?php

namespace App\Models;

use App\Models\Scopes\SlugScope;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\URL;

/**
 * Class Tag.
 *
 * @property string slug
 */
class Tag extends Model
{
    use SlugScope;

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
}
