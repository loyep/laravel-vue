<?php

namespace App\Models;

use App\Models\Traits\BelongsToCategory;
use App\Models\Traits\BelongsToUser;
use App\Models\Traits\HasComments;
use App\Models\Traits\HasContent;
use App\Models\Traits\HasSettingsProperty;
use App\Models\Traits\HasTags;
use App\Models\Traits\HasTopics;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class Article extends Model
{
    use BelongsToCategory, BelongsToUser, HasTopics, HasTags, HasContent, HasComments;
    use HasSettingsProperty;

    /**
     * @var static
     */
    public $previous;

    /**
     * @var static
     */
    public $next;

    /**
     * @var Collection|null
     */
    public $relatedPosts;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'excerpt', 'image', 'thumbnail', 'user_id', 'category_id',
        'type', 'status', 'order', 'views_count', 'likes_count', 'comments_count', 'comment_type',
        'password', 'published_at', 'viewed_at', 'source', 'scripts', 'styles', 'settings',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'link',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'       => 'int',
        'settings' => 'array',
    ];

    /**
     * @return mixed
     */
    public function getPublishedDateAttribute()
    {
        return $this->published_at->diffForHumans();
    }

    /**
     * @param Builder $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', now())
            ->has('user')
            ->where('status', 'published');
    }

    /**
     * @param Builder $query
     *
     * @return mixed
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * @return string
     */
    public function getLinkAttribute()
    {
        return route('article.show', $this->slug);
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        $template = $this->template;
        if (!isset($template)) {
            $template = 'template.' . $this->type;
        }

        return $template;
    }

    /**
     * Next Article.
     *
     * @return static
     */
    public function next()
    {
        if ($this->next === null) {
            $this->next = static::where('published_at', '>', $this->published_at)
                ->where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->first();
        }
        return $this->next;
    }

    /**
     * @return mixed
     */
    public function related()
    {
        if ($this->relatedPosts === null) {
            $this->relatedPosts = static::take(4)->get();
        }
        return $this->relatedPosts;
    }

    /**
     * @return mixed
     */
    public function convergences()
    {
        return static::take(4)->get();
    }

    /**
     * Previous Article.
     *
     * @return static
     */
    public function previous()
    {
        if ($this->next === null) {
            $this->previous = static::where('published_at', '<', $this->published_at)
                ->where('status', 'published')
                ->orderBy('published_at', 'asc')
                ->first();
        }
        return $this->previous;
    }
}
