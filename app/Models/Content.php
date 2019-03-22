<?php

namespace App\Models;

use App\Facades\Prism;
use App\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Content
 *
 * @property string html
 * @property string markdown
 * @property boolean is_html
 *
 * @package App\Models
 */
class Content extends Model
{
    use Cachable;

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
