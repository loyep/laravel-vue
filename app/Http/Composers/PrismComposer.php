<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class PrismComposer
{
    /**
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        //
    }

    /**
     * @param View $view
     *
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
