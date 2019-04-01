<?php

namespace App\Traits;

use App\Models\Collection\MetaCollection;
use App\Models\Meta;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait MetaFields.
 *
 * @property MetaCollection meta
 */
trait MetaFields
{
    /**
     * @param string $attribute
     *
     * @return mixed|null
     */
    public function getMeta($attribute)
    {
        if ($meta = $this->meta->{$attribute}) {
            return $meta;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->meta();
    }

    /**
     * @param Builder $query
     * @param $meta
     * @param null   $value
     * @param string $operator
     *
     * @return Builder
     */
    public function scopeHasMeta(Builder $query, $meta, $value = null, string $operator = '=')
    {
        if (!is_array($meta)) {
            $meta = [$meta => $value];
        }
        foreach ($meta as $key => $value) {
            $query->whereHas('meta', function (Builder $query) use ($key, $value, $operator) {
                if (!is_string($key)) {
                    return $query->where('key', $operator, $value);
                }
                $query->where('key', $operator, $key);

                return is_null($value) ? $query :
                    $query->where('value', $operator, $value);
            });
        }

        return $query;
    }

    /**
     * @param Builder $query
     * @param $meta
     * @param null $value
     *
     * @return Builder
     */
    public function scopeHasMetaLike(Builder $query, $meta, $value = null)
    {
        return $this->scopeHasMeta($query, $meta, $value, 'like');
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    public function saveField($key, $value)
    {
        return $this->saveMeta($key, $value);
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    public function saveMeta($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->saveOneMeta($k, $v);
            }
            $this->load('meta');

            return true;
        }

        return $this->saveOneMeta($key, $value);
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    private function saveOneMeta($key, $value)
    {
        $meta = $this->meta()->where('key', $key)
            ->firstOrNew(['key' => $key]);
        $result = $meta->fill(['value' => $value])->save();
        $this->load('meta');

        return $result;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createField($key, $value)
    {
        return $this->createMeta($key, $value);
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection
     */
    public function createMeta($key, $value = null)
    {
        if (is_array($key)) {
            return collect($key)->map(function ($value, $key) {
                return $this->createOneMeta($key, $value);
            });
        }

        return $this->createOneMeta($key, $value);
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createOneMeta($key, $value)
    {
        $meta = $this->meta()->create([
            'key'   => $key,
            'value' => $value,
        ]);
        $this->load('meta');

        return $meta;
    }

    /**
     * @return mixed
     */
    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function getMetaValue($key)
    {
        return $this->meta->{$key};
    }
}
