<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class MenuItem
 * @package App\Models
 */
class MenuItem extends Model
{
    /**
     * @var array
     */
    protected $with = [
        'items',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(self::class, 'parent', 'id');
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
}
