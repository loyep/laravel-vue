<?php

namespace App\Transformers;

use App\Models\Theme;

/**
 * Class ThemeTransformer.
 */
class ThemeTransformer extends TransformerAbstract
{
    /**
     * Transform the Theme entity.
     *
     * @param \App\Models\Theme $model
     *
     * @return array
     */
    public function transform(Theme $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
