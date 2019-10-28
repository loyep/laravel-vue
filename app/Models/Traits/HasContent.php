<?php

namespace App\Models\Traits;

use App\Models\Content;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasContent
{
    /**
     * Get the content for the model.
     *
     * @return MorphOne
     */
    public function content(): MorphOne
    {
        return $this->morphOne(Content::class, 'contentable');
    }

    /**
     * @return mixed
     */
    public function html()
    {
        $content = $this->content;
        if (empty($content)) {
            return '';
        }
        $body = $content->body;
        if (empty($body)) {
            $body = Content::toHTML($content->markdown);
        }
        return $body;
    }
}
