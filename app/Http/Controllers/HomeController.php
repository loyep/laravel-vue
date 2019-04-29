<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category')->withCount('comments')->orderByDesc('published_at')->paginate();

        return view('home', compact('posts'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history(Request $request)
    {
        Prism::setTitle('最近浏览');
        $history = collect(explode(',', Cookie::get('view_history')))->filter(function ($item) {
            return !empty($item);
        })->map(function ($item) {
            return (int)$item;
        });

        if (!empty($viewHistory)) {
            $posts = Post::with('category')->withCount('comments')->orderByDesc('published_at')->whereIn('id', $history)->paginate();
        }

        return view('history', compact('posts'));
    }

    /**
     * Search.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $q = $request->q;
        $posts = Post::where('title', 'like', '%' . $q . '%')->paginate();

        return view('search', compact('q', 'posts'));
    }

    /**
     * @param Request $request
     */
    public function feed(Request $request)
    {
    }
}
