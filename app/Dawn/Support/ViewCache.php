<?php

namespace App\Dawn\Support;

use App\Dawn\Exceptions\MethodNotSupportedException;
use Illuminate\Cache\TaggableStore;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Support\Facades\Cache;

class ViewCache
{
    /**
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $view;

    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * @var \Illuminate\Contracts\Cache\Factory
     */
    protected $cacheManager;

    /**
     * @var string
     */
    protected $cacheKey;

    /**
     * @var bool
     */
    protected $cacheIsTaggable;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var int|null
     */
    protected $seconds;

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->cacheKey = config('dawn.cache.key');
        $this->cacheIsTaggable = is_a(Cache::driver()->getStore(), TaggableStore::class);
        $this->enabled = config('dawn.cache.enabled', false);
        $this->seconds = config('dawn.cache.expire');
    }

    /**
     * Cache a view. If seconds are null, the view is cached forever.
     *
     * @param array        $data
     * @param string       $view
     * @param array        $mergeData
     * @param int          $seconds
     * @param string       $key
     * @param string|array $tag
     *
     * @return string
     */
    public function cache($data, $view, $mergeData = null, $seconds = null, $key = null, $tag = null)
    {
        if (!$this->enabled) {
            return call_user_func($this->renderView($view, $data, $mergeData));
        }

        $viewKey = $this->getCacheKeyForView($view, $key);
        $mergeData = $mergeData ?: [];

        $tags = $this->getTags($tag);
        $seconds = $this->resolveCacheDuration($seconds);

        if ($this->cacheIsTaggable && $seconds === null) {
            return Cache::tags($tags)->rememberForever($viewKey, $this->renderView($view, $data, $mergeData));
        }

        if ($this->cacheIsTaggable) {
            return Cache::tags($tags)->remember($viewKey, $seconds, $this->renderView($view, $data, $mergeData));
        }

        if ($seconds === null) {
            return Cache::rememberForever($viewKey, $this->renderView($view, $data, $mergeData));
        }

        return Cache::remember($viewKey, $seconds, $this->renderView($view, $data, $mergeData));
    }

    /**
     * Render a view.
     *
     * @param string $view
     * @param array  $data
     * @param array  $mergeData
     *
     * @return string
     */
    protected function renderView($view, $data, $mergeData)
    {
        $data = $data ?: [];
        $mergeData = $mergeData ?: [];
        return function () use ($view, $data, $mergeData) {
            return $this->view->make($view, $data, $mergeData)->render();
        };
    }

    /**
     * Create a key name for the cached view.
     *
     * @param string $view
     * @param string $key
     *
     * @return string
     */
    public function getCacheKeyForView($view, $key = null)
    {
        $parts = [$this->cacheKey, $view];
        if ($key !== null) {
            $parts[] = $key;
        }
        return implode('.', $parts);
    }

    /**
     * Constructs tag array.
     *
     * @param null|string|array $tag
     *
     * @return array
     */
    protected function getTags($tag = null)
    {
        $tags = [$this->cacheKey];
        if ($tag) {
            if (!is_array($tag)) {
                $tag = [$tag];
            }
            $tags = array_merge($tags, $tag);
        }
        return $tags;
    }

    /**
     * Resolve cache duration, defaults to the config if seconds is null.
     *
     * @param int|null $seconds
     *
     * @return int|null
     */
    protected function resolveCacheDuration($seconds = null)
    {
        if (is_null($seconds)) {
            return $this->seconds;
        }
        return $seconds;
    }

    /**
     * Forget a rendered view.
     *
     * @param string            $view
     * @param string            $key
     * @param null|string|array $tag
     */
    public function forget($view, $key = null, $tag = null)
    {
        $cacheKey = $this->getCacheKeyForView($view, $key);
        if ($this->cacheIsTaggable) {
            $tags = $this->getTags($tag);
            $this->cache->tags($tags)->forget($cacheKey);
        }
        $this->cache->forget($cacheKey);
    }

    /**
     * Empty all views linked to a tag or the complete partial cache.
     * Note: Only supported by Taggable cache drivers.
     *
     * @param string $tag
     *
     * @throws \App\Dawn\Exceptions\MethodNotSupportedException
     */
    public function flush($tag = null)
    {
        if (!$this->cacheIsTaggable) {
            throw new MethodNotSupportedException('The cache driver ('.
                get_class($this->cacheManager->driver()).') doesn\'t support the flush method.');
        }
        $tag = $tag ?: $this->cacheKey;
        $this->cache->tags($tag)->flush();
    }
}
