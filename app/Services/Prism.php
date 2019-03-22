<?php

namespace App\Services;

use App\Models\Post;

class Prism
{
    /**
     * The Prism version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * @var \Parsedown
     */
    protected $parser;

    public function __construct()
    {
        $this->bootParser();
    }

    public function bootParser()
    {
        try {
            $this->parser = new \ParsedownExtra();
        } catch (\Exception $e) {
            $this->parser = new \Parsedown();
        }
    }

    protected $socialShare;

    /**
     * @var string
     */
    protected static $metaTitle;

    /**
     * Set Prism title.
     *
     * @param $title
     */
    public function setTitle($title)
    {
        self::$metaTitle = $title;
    }

    /**
     * The Prism version.
     *
     * @return string
     */
    public function version()
    {
        return self::VERSION;
    }

    public function setShare(string $url, string $title = null, string $des = null, string $pic = null)
    {
        $this->socialShare = new Share($url, $title, $des, $pic);
    }

    public function share()
    {
        return $this->socialShare;
    }

    public function markdown($text)
    {
        return $this->parser->text($text);
    }

    /**
     * Title.
     *
     * @return string
     */
    public function title()
    {
        $title = self::$metaTitle;
        if (!empty($title)) {
            return $title;
        }

        return config('app.name');
    }

    public function relatedPosts($post)
    {
        return Post::where('category_id', $post->category_id)->take(0)->get();
    }

    public function stickyPosts($count = 4)
    {
        return Post::withCount('comments')->with('category')->orderBy('comments_count', 'desc')->orderBy('views', 'desc')->take($count)->get();
    }

    /**
     * @param $group
     *
     * @return array
     */
    public function menus($group)
    {
        return [[
            'url' => '/',
            'target' => '__selft',
            'title' => '首页',
        ]];
    }
}
