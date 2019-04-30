<?php

namespace App\Models;

use App\Models\Collection\MetaCollection;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Meta.
 *
 * @property string $key
 * @property string $value
 */
class Meta extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value',
    ];

    /**
     * @return MorphTo|null
     */
    public function metaable(): ?MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @param array $models
     *
     * @return MetaCollection
     */
    public function newCollection(array $models = [])
    {
        return new MetaCollection($models);
    }
}
