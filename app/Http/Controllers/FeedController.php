<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

/**
 * Class HomeController.
 */
class FeedController extends Controller
{
    /**
     * @return Response
     */
    public function feed()
    {
        $view = Cache::remember('feed', -1, function () {
            $articles = Article::all();

            return view('feed', compact('articles'))->render();
        });

        return response($view)->header('Content-Type', 'text/xml');
    }

    /**
     * @return Response
     */
    public function siteMap()
    {
        $view = Cache::remember('sitemap', -1, function () {
            $articles = Article::all();

            return view('sitemap', compact('articles'))->render();
        });

        return response($view)->header('Content-Type', 'text/xml');
    }
}
