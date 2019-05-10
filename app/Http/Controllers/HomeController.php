<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = Article::orderByDesc('published_at')->paginate();

        $articles->load([
            'category',
            'user',
        ]);

        if ($request->ajax()) {
            return view('components.card.article-list', compact('articles'));
        }

        return view('home', compact('articles'));
    }

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
