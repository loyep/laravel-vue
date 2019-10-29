<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait BelongsToUser
{
    /**
     *
     */
    public static function bootBelongsToUser()
    {
        static::saving(function ($model) {
            $model->user_id = $model->user_id ?? Auth::id();
        });
    }

    /**
     * Get the user for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
