<?php

namespace App\Models;

use App\Facades\Prism;

/**
 * Class Content.
 *
 * @property string html
 * @property string markdown
 * @property bool is_html
 */
class Content extends Model
{
    /**
     * @return string
     */
    public function content()
    {
        if ($this->is_html) {
            $html = $this->html;
        } else {
            $html = Prism::markdown($this->markdown);
        }

        return $html;
    }
}
