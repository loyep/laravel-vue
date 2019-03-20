<?php

namespace App\Models;

use App\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use  Cachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'display_name', 'value', 'details', 'type', 'group',
    ];
}
