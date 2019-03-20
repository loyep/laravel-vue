<?php

namespace App\Models;

use App\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Post.
 *
 * @property \App\Models\User user
 */
class Post extends Model
{
    use Cachable;

    protected $with = [
        'user', 'content',
    ];

    /**
     * @return MorphOne
     */
    public function content(): MorphOne
    {
        return $this->morphOne(Content::class, 'contentable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
