<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * @return string
     */
    public function getPermLinkAttribute()
    {
        return route('tag.show', ['slug' => $this->slug]);
    }
}
