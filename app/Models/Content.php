<?php

namespace App\Models;

use App\Prism\Facades\Prism;
use App\Traits\Cachable;

/**
 * Class Content.
 *
 * @property string html
 * @property string markdown
 * @property bool is_html
 */
class Content extends Model
{
    use Cachable;

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
