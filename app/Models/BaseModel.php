<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseModel extends Model
{
    /**
     * Destroy the models for the given IDs.
     *
     * @param array|Collection|int $ids
     *
     * @return int
     */
    public static function destroy($ids)
    {
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }

        return parent::destroy($ids);
    }
}
