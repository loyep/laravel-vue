<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use App\Models\Link;
use App\Models\Menu;
use App\Models\Search;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

/**
 * Class PrismService.
 */
class PrismService
{
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
        return config('prism.app.socials', []);
    }

    /**
     * @return mixed
     */
    public function footerTags()
    {
        return Tag::take(16)->get();
    }

    public function convergence($article)
    {
        $articles = Article::where('category_id', $article->category_id)->take(4)->get();

        return $articles;
    }

    /**
     * @return mixed
     */
    public function searchTop()
    {
        return Cache::remember('search_top', 60, function () {
            return Search::orderByDesc('search_count')->take(8)->get();
        });
    }

    /**
     * @param string $group
     *
     * @return mixed
     */
    public function notice($group = 'system')
    {
        $notice = Setting::where('group', $group)->where('key', 'notice')->first();
        if (!empty($notice)) {
            return $notice->value;
        }
    }

    /**
     * @return int|string
     */
    public function year()
    {
        $year = (int) (config('prism.app.year') ?? date('Y'));
        if ($year < date('Y')) {
            $year .= '-'.date('Y');
        }

        return $year;
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function description()
    {
        return config('prism.app.description');
    }

    /**
     * @return mixed
     */
    public function footerCategories()
    {
        return Category::take(12)->get();
    }

    /**
     * @param $name
     *
     * @return Menu
     */
    public function menus($name)
    {
        $menu = Menu::with(['items' => function ($query) {
            $query->where('parent', 0);
        }])->where('name', $name)->first();

        return $menu;
    }
}
