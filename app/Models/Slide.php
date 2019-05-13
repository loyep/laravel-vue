<?php

namespace App\Models;

class Slide extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'user_agent', 'path', 'title',
        'location', 'browser', 'route',
        'is_robot', 'device', 'languages',
    ];
}
