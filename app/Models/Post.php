<?php

namespace App\Models;

use App\Models\Meta\MetaFields;
use App\Models\Scopes\SlugScope;
use App\Traits\Cachable;
use App\Traits\Likable;
use Carbon\Carbon;
use Carbon\Traits\Date;
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
 * @property int likes_count
 * @property int views_count
 * @property int id
 * @property-read  string perm_link
 * @property string image
 * @property string title
 * @property string excerpt
 * @property Content content
 * @property Date published_at
 * @property string slug
 * @property object meta
 */
class Post extends Model
{
    use Cachable, Likable, SlugScope, MetaFields;

    protected $with = [
        'meta',
    ];

    protected $dates = [
        'published_at',
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

    /**
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return string
     */
    public function getPermLinkAttribute()
    {
        return URL::route('post.show', ['slug' => $this->slug]);
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function getImageAttribute($value)
    {
        return $value ?: asset('static/images/default.png');
    }

    public function getPublishedDate()
    {
        $date = $this->published_at;
        if (Carbon::now() > $this->published_at->addDays(7)) {
            return $date->toDateString();
        }

        return $date->diffForHumans();
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
//    public function __get($key)
//    {
//        $value = parent::__get($key);
//        if (is_null($value) && !property_exists($this, $key)) {
//            $value = $this->getMetaValue($key);
//        }
//        return $value;
//    }

    public function getLink()
    {
        return URL::route('post.show', ['slug' => $this->slug]);
    }
}
