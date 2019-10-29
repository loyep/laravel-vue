<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image', 'thumbnail', 'description', 'settings', 'parent_id', 'order',
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
     * @return string
     */
    public function getLinkAttribute()
    {
        return route('category.show', $this->slug);
    }

    /**
     * @return HasMany|null
     */
    public function posts(): ?HasMany
    {
        return $this->hasMany(Post::class);
    }

}
