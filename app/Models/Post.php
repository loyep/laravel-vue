<?php

namespace App\Models;

use App\Models\Scopes\SlugScope;
use App\Traits\Cachable;
use App\Traits\CanLike;
use App\Traits\MetaFields;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\URL;

/**
 * Class Post.
 *
 * @property User user
 * @property Category category
 * @property int likes
 * @property int views
 * @property int id
 * @property-read  string perm_link
 * @property string image
 * @property string title
 * @property string excerpt
 * @property Content content
 * @property string published_at
 * @property string slug
 * @property meta
 */
class Post extends Model
{
    use Cachable, CanLike, SlugScope, MetaFields;

    protected $dates = [
        'published_at',
    ];

    protected $with = [
        'meta',
    ];

    /**
     * @return MorphOne
     */
    public function content(): MorphOne
    {
        return $this->morphOne(Content::class, 'contentable');
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getPermLinkAttribute()
    {
        return URL::route('post.show', ['slug' => $this->slug]);
    }

    public function getImageAttribute($value)
    {
        return $value ?: asset('static/images/default.png');
    }

    public function getPublishedDateAttribute()
    {
        return Carbon::parse($this->published_at)->toDateString();
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        $value = parent::__get($key);
        if ($value === null && !property_exists($this, $key)) {
            return $this->getMetaValue($key);
        }

        return $value;
    }
}
