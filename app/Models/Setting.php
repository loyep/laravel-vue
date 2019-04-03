<?php

namespace App\Models;

use App\Traits\Cachable;

class Setting extends Model
{
    use Cachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'display_name', 'value', 'details', 'type', 'group',
    ];

    public function toArray()
    {
        if ($this instanceof self) {
            return [$this->key => $this->value];
        }

        return parent::toArray();
    }
}
