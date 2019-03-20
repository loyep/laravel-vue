<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
        $posts = Post::cache(10 * 60)->with([
            'content' => function ($q) {
                $q->cache(60 * 60);
            }
        ])->paginate();
        return view('home', compact('posts'));
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
        $q = trim($request->get('q'));

        return view('search', compact('q'));
    }

    /**
     * @param Request $request
     */
    public function feed(Request $request)
    {
    }
}
