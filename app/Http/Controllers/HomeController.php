<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderByDesc('published_at')->paginate(12);

        return view('home', compact('posts'));
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
            return (int)$item;
        });

        Prism::setTitle('最近浏览');
        if (!empty($history)) {

            $posts = Post::with('category')
                ->orderByDesc('published_at')
                ->whereIn('id', $history)
                ->paginate(12);

            return view('history', compact('posts'));
        }
        return view('history', compact('posts'));
    }

    /**
     * Search.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $q = $request->q;
        $posts = Post::where('title', 'like', '%' . $q . '%')->paginate();
        $search = Search::where('query', $q)->first();
        if (!$search) {
            $search = new Search;
            $search->query = $q;
            $search->save();
        }

        if ($posts->count() > 0) {
            $search->increment('search_count');
        }

        return view('search', compact('q', 'posts'));
    }

    /**
     * @return Response
     */
    public function feed()
    {
        $view = Cache::remember('feed', -1, function () {
            $posts = Post::all();
            return view('feed', compact('posts'))->render();
        });
        return response($view)->header('Content-Type', 'text/xml');
    }

    /**
     * @return Response
     */
    public function siteMap()
    {
        $view = Cache::remember('sitemap', -1, function () {
            $posts = Post::all();
            return view('sitemap', compact('posts'))->render();
        });
        return response($view)->header('Content-Type', 'text/xml');
    }
}
