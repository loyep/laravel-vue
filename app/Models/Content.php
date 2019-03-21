<?php

namespace App\Models;

use App\Facades\Prism;
use App\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Content
 *
 * @property string body
 * @property string markdown
 *
 * @package App\Models
 */
class Content extends Model
{
    use Cachable;

    public function html()
    {
        $content = $this->body;
        if (empty($content)) {
            $content = Prism::markdown($this->markdown);
        }
        return $content;
    }
}
