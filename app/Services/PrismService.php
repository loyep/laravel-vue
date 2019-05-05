<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Link;
use App\Models\Search\Search;
use App\Models\Setting;
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
        $socials = Setting::where('group', 'system')->where('key', 'social')->first();
        if (!empty($socials)) {
            return $socials->value;
        }
        return [];
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
            return Search::orderByDesc('search_count')->take(8)->get();
        });
    }

    /**
     * @param string $group
     * @return mixed
     */
    public function notice($group = 'system')
    {
        $notice = Setting::where('group', $group)->where('key', 'notice')->first();
        if (!empty($notice)) {
//            dd($notice->value);
            return $notice->value;
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function footerCategories()
    {
        return Category::take(12)->get();
    }
}
