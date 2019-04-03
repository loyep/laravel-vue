<?php

namespace App\Prism;

use App\Models\Post;
use App\Services\ShareService;

class PrismApp
{
    /**
     * The PrismApp version.
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
     * Set PrismApp title.
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        self::$metaTitle = $title;
    }

    /**
     * The PrismApp version.
     *
     * @return string
     */
    public function version()
    {
        return self::VERSION;
    }

    public function setShare(string $url, string $title = null, string $des = null, string $pic = null)
    {
        $this->socialShare = new ShareService($url, $title, $des, $pic);
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
        return Post::where('category_id', $post->category_id)->take(4)->get();
    }

    public function stickyPosts($count = 4)
    {
        return Post::withCount('comments')->with('category')->orderBy('comments_count', 'desc')->orderBy('views', 'desc')->take($count)->get();
    }

    /**
     * @param string $group
     *
     * @return array
     */
    public function menus(string $group)
    {
        return [[
            'url'    => '/',
            'target' => '__selft',
            'title'  => '首页',
        ]];
    }
}
