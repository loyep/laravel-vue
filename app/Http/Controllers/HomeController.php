<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Article;
use App\Models\Search\Search;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

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
        $articles = Article::with('category')->orderByDesc('published_at')->paginate(12);

        if ($request->isMethod('post')) {
            return view('components.card.article-list', compact('articles'));
        }

        return view('home', compact('articles'));
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function history(Request $request)
    {
        $history = collect(explode(',', Cookie::get('history')))->filter(function ($item) {
            return !empty($item);
        })->map(function ($item) {
            return (int) $item;
        });

        $articles = Article::with('category')
            ->orderByDesc('published_at')
            ->whereIn('id', $history)
            ->paginate();

        if ($request->isMethod('post')) {
            return view('components.card.article-list', compact('articles'));
        }

        Prism::setTitle('最近浏览');

        return view('history', compact('articles'));
    }

    /**
     * Search.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function search(Request $request)
    {
        $q = $request->q;
        $articles = Article::where('title', 'like', '%'.$q.'%')->paginate();

        if ($request->isMethod('post')) {
            return view('components.card.article-list', compact('articles'));
        }

        $search = Search::where('query', $q)->first();
        if (!$search) {
            $search = new Search();
            $search->query = $q;
            $search->save();
        }

        if ($articles->count() > 0) {
            $search->increment('search_count');
        }

        return view('search', compact('q', 'articles'));
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
