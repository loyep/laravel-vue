<?php

namespace App\Models;

class Post extends Model
{
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['content'];

}
