<?php

namespace App\Models;

/**
 * Class Setting.
 */
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

    /**
     * @param $value
     */
    public function setDetailsAttribute($value)
    {
        $this->attributes['details'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getDetailsAttribute($value)
    {
        return json_decode(!empty($value) ? $value : '{}');
    }

    /**
     * @param $value
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getValueAttribute($value)
    {
        return json_decode(!empty($value) ? $value : '{}');
    }
}
