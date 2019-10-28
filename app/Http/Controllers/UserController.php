<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function showProfile(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'user' => Auth::user()
            ]);
        }
        return view('user.profile');
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
     * @return \Illuminate\Http\Response
     */
    public function articles()
    {
//        $articles = Article::with(['category'])
//            ->published()
//            ->recent()
//            ->where('user_id', Auth::user()->id)
//            ->paginate(12);
//        $list = view('components.posts.small', compact('posts'));

        return view('user.articles');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function favorites()
    {
        return view('user.favorites');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        return view('user.history');
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
