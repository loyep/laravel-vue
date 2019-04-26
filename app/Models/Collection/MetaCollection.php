<?php

namespace App\Models\Collection;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Collection;

class MetaCollection extends Collection
{
    /**
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if (isset($this->items) && !empty($this->items)) {

            $meta = $this->first(function (Meta $meta) use ($key) {
                return $meta->key === $key;
            });

            if ($meta) {
                $res = json_decode($meta->value);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $res;
                }
                return $meta->value;
            }
            return null;
        }
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return !is_null($this->__get($name));
    }
}
