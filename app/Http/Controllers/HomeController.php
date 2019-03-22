<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        Log::info('home');
        $posts = Post::with('category')->withCount('comments')->paginate();

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
