<?php

namespace App\Traits;

use Illuminate\Database\Query\Builder;

trait HasSlug
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
