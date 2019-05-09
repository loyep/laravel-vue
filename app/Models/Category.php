<?php

namespace App\Models;

use App\Models\Scopes\SlugScope;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\URL;

/**
 * Class Category.
 *
 * @property string slug
 */
class Category extends Model
{
    use SlugScope;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image', 'description',
    ];

    /**
     * @return HasMany|null
     */
    public function articles(): ?HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return URL::route('category.show', ['slug' => $this->slug]);
    }
}
