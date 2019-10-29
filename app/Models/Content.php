<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use ParsedownExtra;

class Content extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contentable_type', 'contentable_id', 'body', 'markdown',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'             => 'int',
        'contentable_id' => 'int',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($content) {
            if ($content->isDirty('markdown') && !empty($content->markdown)) {
                $content->body = self::toHTML($content->markdown);
            }
//            $content->body = Purifier::clean($content->body);
        });

//        static::saved(function ($content) {
//            \dispatch(new FetchContentMentions($content));
//        });
    }

    /**
     * @param string $markdown
     *
     * @return mixed
     */
    public static function toHTML($markdown)
    {
        return app(ParsedownExtra::class)->text($markdown);
    }

    /**
     * @return MorphTo
     */
    public function contentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsToMany
     */
    public function mentions(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'content_mentions');
    }

}
