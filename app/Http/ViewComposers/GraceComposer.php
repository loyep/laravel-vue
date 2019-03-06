<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class GraceComposer
{

    /**
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('navigation', [
            'items1', 'items2', 'item3'
        ]);
    }

    /**
     * @param  View $view
     * @return void
     */
    public function footerCompose(View $view)
    {
        $view->with('footer_info', get_widget('footer_info'));
        $view->with('current_user', current_user());
    }
}
