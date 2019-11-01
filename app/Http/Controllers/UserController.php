<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        // $posts = Article::with(['category', 'user'])
        //     ->published()
        //     ->recent()
        //     // ->where('user_id', Auth::user()->id)
        //     ->paginate(12);
        // $list = view('users.partials.post-item', compact('posts'));

        return view('user.home');
        // return view('users.home', compact('list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile(Request $request)
    {
        return view('user.profile');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        return response()->json([
            'user' => Auth::user()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comments()
    {
        return view('user.comments');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function posts(Request $request)
    {
        $posts = $request->user()
            ->posts()
            ->with(['category', 'user'])
            ->published()
            ->recent()
            ->paginate(16);

        return view('user.posts', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function favorites(Request $request)
    {
        $user = $request->user();
        $posts = $user->favorites()
            ->with(['category', 'user'])
            ->recent()
            ->paginate(16);

        return view('user.favorites', compact('posts'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function history(Request $request)
    {

        $historyKey = 'post_history|'.$request->ip();
        $history = Cache::get($historyKey, []);
        $posts = Post::with('category')->published()->recent()->whereIn('id', $history)->paginate(16);
        return view('user.history', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function write()
    {
        return view('user.write');
    }

}
