<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    /**
     * @return HasOne
     */
    public function content(): HasOne
    {
        return $this->hasOne('App\Models\PostContent');
    }
}
