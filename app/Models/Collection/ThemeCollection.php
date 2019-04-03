<?php

namespace App\Models\Collection;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Collection;

class ThemeCollection extends Collection
{
    /**
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if (isset($this->items) && count($this->items)) {
            $theme = $this->first(function (Theme $theme) use ($key) {
                return $theme->key === $key;
            });

            return $theme ? $theme->value : null;
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
