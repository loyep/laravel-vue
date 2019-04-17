<?php

namespace App\Http\ViewComposers\Shared;

use Illuminate\Contracts\View\View;

/**
 * Class GlobalViewComposer.
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
