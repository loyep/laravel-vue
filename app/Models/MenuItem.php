<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    protected $with = [
        'items',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(self::class, 'parent', 'id');
    }

    public function getUrl()
    {
        return $this->url;
    }
}
