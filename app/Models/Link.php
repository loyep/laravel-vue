<?php

namespace App\Models;

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
