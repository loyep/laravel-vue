<?php

namespace App\Models;

use App\Traits\Cachable;
use App\Traits\CanLike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Post.
 *
 * @property \App\Models\User user
 * @property \App\Models\Category category
 * @property int likes
 * @property int views
 * @property int id
 */
class Post extends Model
{
    use Cachable, CanLike;

    protected $with = [
        'user',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return string
     */
    public function getPermLinkAttribute()
    {
        return route('post.show', ['slug' => $this->slug]);
    }
}
