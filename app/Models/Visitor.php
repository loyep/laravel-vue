<?php

namespace App\Models;

class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'user_agent', 'path', 'title', 'location', 'browser', 'route', 'is_robot', 'device', 'languages',
    ];
}
