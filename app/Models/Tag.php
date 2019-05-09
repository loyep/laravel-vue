<?php

namespace App\Models;

use App\Models\Scopes\SlugScope;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    public function getLink()
    {
        return URL::route('tag.show', ['slug' => $this->slug]);
    }

    /**
     * @return BelongsToMany|null
     */
    public function articles(): ?BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
