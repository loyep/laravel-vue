<?php

namespace App\Models;

use App\Models\Collection\ThemeCollection;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Meta.
 *
 * @property string $key
 * @property string $value
 */
class Theme extends Model
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value',
    ];

    /**
     * @return MorphTo
     */
    public function themeble(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @param array $models
     *
     * @return ThemeCollection
     */
    public function newCollection(array $models = [])
    {
        return new ThemeCollection($models);
    }
}
