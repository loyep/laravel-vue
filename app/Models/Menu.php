<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
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

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'menu_id');
    }
}
