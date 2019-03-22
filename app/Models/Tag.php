<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 * Class Tag
 *
 * @property string slug
 *
 * @package App\Models
 */
class Tag extends Model
{

    /**
     * @return string
     */
    public function getPermLinkAttribute()
    {
        return URL::route('tag.show', ['slug' => $this->slug]);
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
