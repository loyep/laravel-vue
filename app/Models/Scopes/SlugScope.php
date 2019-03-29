<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait SlugScope
{
    /**
     * @param Builder $query
     * @param string  $slug
     *
     * @return Builder
     */
    public function scopeSlugBy(Builder $query, string $slug)
    {
        return $query->where('slug', '=', $slug);
    }
}
