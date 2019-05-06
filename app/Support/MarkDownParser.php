<?php

namespace App\Support;

use Exception;
use Parsedown;
use ParsedownExtra;

/**
 * Class MarkDownParser
 */
class MarkDownParser
{
    /**
     * @var Parsedown
     */
    protected $parser;

    /**
     * MarkDownParser constructor.
     */
    public function __construct()
    {
        try {
            $this->parser = new ParsedownExtra();
        } catch (Exception $e) {
            $this->parser = new Parsedown();
        }
    }

    /**
     * Convert Markdown To Html.
     *
     * @param $markdown
     * @return string
     */
    public function handleMarkdownToHtml($markdown)
    {
        return $this->parser
            ->setBreaksEnabled(true)
            ->text($markdown);
    }

}
