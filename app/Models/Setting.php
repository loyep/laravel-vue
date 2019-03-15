<?php

namespace App\Models;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'display_name', 'value', 'details', 'type', 'group',
    ];
}
