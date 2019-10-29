<?php

namespace App\Models;

use App\Models\Traits\HasContent;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasContent;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'post_id', 'parent_id', 'user_id', 'url', 'email', 'status', 'avatar', 'type', 'user_agent', 'order'
    ];
}
