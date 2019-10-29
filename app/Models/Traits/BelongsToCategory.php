<?php

namespace App\Models\Traits;

use App\Models\Category;

trait BelongsToCategory
{
    /**
     * Get the user for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
}
