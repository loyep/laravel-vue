<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * Destroy the models for the given IDs.
     *
     * @param \Illuminate\Support\Collection|array|int $ids
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
