<?php

namespace App\Prism;

use App\Models\Post;
use App\Services\ShareService;
use Parsedown;

/**
 * Class PrismA.
 */
class Prism
{
    /**
     * @var Parsedown
     */
    protected $parser;

    /**
     * PrismApp constructor.
     */
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

    /**
     * @return string
     */
    public function name()
    {
        return config('app.name', 'Prism');
    }

    /**
     * @var ShareService
     */
    protected $socialShare;

    /**
     * @var string
     */
    protected $title;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        $title = $this->name();
        if (!empty($this->title)) {
            $title = $this->title . ' - ' . $title;
        }

        return $title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $url
     * @param string|null $title
     * @param string|null $des
     * @param string|null $pic
     */
    public function setShare(string $url, string $title = null, string $des = null, string $pic = null)
    {
        $this->socialShare = new ShareService($url, $title, $des, $pic);
    }

    /**
     * @return mixed
     */
    public function share()
    {
        return $this->socialShare;
    }

    /**
     * @param string|null $text
     *
     * @return string
     */
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
        $title = $this->name();
        if (!empty($this->title)) {
            $title = $this->title . ' - ' . $title;
        }

        return $title;
    }

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function relatedPosts(Post $post)
    {
        return Post::where('category_id', $post->category_id)->take(4)->get();
    }

    /**
     * @param int $count
     *
     * @return mixed
     */
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
            'url' => '/',
            'target' => '__selft',
            'title' => '首页',
        ]];
    }
}
