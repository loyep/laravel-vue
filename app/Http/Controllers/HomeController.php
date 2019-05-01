<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $posts = Post::with('category')->withCount('comments')->orderByDesc('published_at')->paginate(12);

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
                ->withCount('comments')
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
     *
     * @return Response
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
