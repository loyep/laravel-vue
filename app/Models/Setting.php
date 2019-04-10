<?php

namespace App\Models;

use App\Traits\Cachable;

/**
 * Class Setting
 * @package App\Models
 */
class Setting extends BaseModel
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

    /**
     * @return array
     */
    public function toArray()
    {
        if ($this instanceof self) {
            return [
                $this->key => $this->value,
            ];
        }

        return parent::toArray();
    }
}
