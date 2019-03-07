<?php

namespace App\Http\ViewComposers;

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
        $view
            ->with('footer_info', get_widget('footer_info'))
//            ->with('site_info', get_option('site_info'))
            ->with('footer_style', get_option('footer_style', 3));
    }
}
