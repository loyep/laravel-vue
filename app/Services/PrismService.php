<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Link;
use App\Models\Search\Search;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/**
 * Class PrismService
 * @package App\Services
 */
class PrismService
{
    /**
     * @return array
     */
    public function footerSettings()
    {
        return [];
    }

    /**
     * @return mixed
     */
    public function links()
    {
        $links = Link::take(6)->get();
        return $links;
    }

    /**
     * @return array|mixed
     */
    public function socials()
    {
        $socials = [
            [
                'name' => 'weibo',
                'link' => '#',
            ],
            [
                'name' => 'github',
                'link' => 'https://github.com/loyep',
            ],
        ];
        $socials = json_decode(json_encode($socials));

        return $socials;
    }

    /**
     * @return bool
     */
    public function isHome()
    {
        return Route::currentRouteName() === 'home';
    }

    /**
     * @return mixed
     */
    public function footerTags()
    {
        return Tag::take(16)->get();
    }

    /**
     * @return mixed
     */
    public function searchTop()
    {
        return Cache::remember('search_top', 60, function () {
            return Search::orderByDesc('search_num')->take(5)->get();
        });
    }

    /**
     * @return mixed
     */
    public function footerCategories()
    {
        return Category::take(12)->get();
    }
}
