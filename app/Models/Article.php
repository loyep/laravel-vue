<?php

namespace App\Models;

use App\Models\Scopes\SlugScope;
use App\Services\ShareService;
use App\Traits\Likable;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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
 * @property string type
 * @property string description
 */
class Article extends Model
{
    use Likable, SlugScope;

    /**
     * @var
     */
    protected $share;

    /**
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    protected $link;

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
     * @return BelongsToMany
     */
    public function tags(): ?BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
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
     * @return mixed
     */
    public function nextArticle()
    {
        return self::where('published_at', '>', $this->published_at)->where('status', 'published')->orderBy('published_at', 'asc')->first();
    }

    /**
     * @return mixed
     */
    public function prevArticle()
    {
        return self::where('published_at', '<', $this->published_at)->where('status', 'published')->orderBy('published_at', 'desc')->first();
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

    /**
     * @return string
     */
    public function getPublishedDate()
    {
        $date = $this->published_at;
        if (Carbon::now() > $this->published_at->addDays(7)) {
            return $date->toDateString();
        }

        return $date->diffForHumans();
    }

    /**
     * @return ShareService
     */
    public function getShare()
    {
        if (empty($this->share)) {
            $this->share = new ShareService($this->getLink(), $this->title, $this->description, $this->image);
        }

        return $this->share;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        if (empty($this->link)) {
            $this->link = URL::route('article.show', ['slug' => $this->slug]);
        }

        return $this->link;
    }
}
