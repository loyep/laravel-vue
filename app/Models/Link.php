<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function getOption($name, $default = '')
    {
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
