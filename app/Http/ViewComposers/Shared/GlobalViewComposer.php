<?php

namespace App\Http\ViewComposers\Shared;

use Illuminate\Contracts\View\View;

/**
 * Class GlobalViewComposer
 * @package App\Http\ViewComposers\Shared
 */
class GlobalViewComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $currentUser = auth()->user();
        $view->with(compact('currentUser'));
    }
}
