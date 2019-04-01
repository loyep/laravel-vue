<?php

namespace App\Models\Collection;


use App\Models\Meta;
use Illuminate\Database\Eloquent\Collection;

class MetaCollection extends Collection
{
    /**
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        if (isset($this->items) && count($this->items)) {
            $meta = $this->first(function (Meta $meta) use ($key) {
                return $meta->key === $key;
            });
            return $meta ? $meta->value : null;
        }
        return null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return !is_null($this->__get($name));
    }
}
