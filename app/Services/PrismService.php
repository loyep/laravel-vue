<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Link;
use App\Models\Search\Search;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

class PrismService
{
    public function footerSettings()
    {
        return [];
    }

    public function links()
    {
        $links = Link::take(6)->get();
        return $links;
    }

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

    public function isHome()
    {
        return Route::currentRouteName() === 'home';
    }

    public function footerTags()
    {
        return Tag::take(16)->get();
    }

    public function searchTop()
    {
        return Search::orderByDesc('search_num')->take(5)->get();
    }

    public function footerCategories()
    {
        return Category::take(12)->get();
    }
}
