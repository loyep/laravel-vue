<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'excerpt', 'image', 'thumbnail', 'user_id', 'category_id',
        'type', 'status', 'order', 'views_count', 'likes_count', 'comments_count', 'comment_type',
        'password', 'published_at', 'viewed_at', 'source', 'scripts', 'styles', 'settings',
    ];
}
