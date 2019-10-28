<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function home()
    {
        // $posts = Article::with(['category', 'user'])
        //     ->published()
        //     ->recent()
        //     // ->where('user_id', Auth::user()->id)
        //     ->paginate(12);
        // $list = view('users.partials.post-item', compact('posts'));

        dd('22222');
        // return view('users.home', compact('list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function profile()
    {
        return view('users.profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function comments()
    {
        return view('users.comments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function posts()
    {
        $posts = Article::with(['category'])
            ->published()
            ->recent()
            ->where('user_id', Auth::user()->id)
            ->paginate(12);
        $list = view('components.posts.small', compact('posts'));

        return view('users.posts', compact('list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function favorites()
    {
        return view('users.favorites');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function write()
    {
        return view('users.write');
    }

    /**
     * Display the specified resource.
     *
     * @param string  $slug
     * @param Request $request
     *
     * @return Response
     */
    public function show($slug, Request $request)
    {
        $user = User::withCount('posts')->whereName($slug)->firstOrFail();

        $posts = Article::with('user')->where('user_id', $user->id)->paginate();
        $style = $user->settings['style'] ?? 'small';

        $list = view('components.posts.small', compact('posts'));
        return view('users.show', compact('user', 'posts', 'list', 'style'));
//        $user = User::withCount('articles')
//            ->whereName($slug
//            )->firstOrFail();
//
//        $articles = Article::with('category')
//            ->whereUserId($user->id)
//            ->paginate();
//
//        Blog::setTitle($user->display_name);
//
//        return view('users.show', compact('articles', 'user'));
    }
}
