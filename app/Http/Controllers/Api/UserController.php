<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        return view('user.index');
        // return view('users.home', compact('list'));
    }

    public function info(Request $request)
    {
        return \response()->json([
            'user' => $request->user()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $input = $request->except(['name', 'email', 'is_admin']);
        Log::info('input', $input);
        $user = Auth::user();
        $user->update($input);
        Log::info('info', $user->toArray());
        return response()->json([
            'user' => $user,
        ]);
    }

    public function showProfile()
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
        return view('users.comments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function articles()
    {
        $posts = Article::with(['category', 'user'])
            ->published()
            ->recent()
            ->where('user_id', Auth::user()->id)
            ->paginate(12);
        return response()->json([
            'data' => $posts,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function favorites()
    {
        return view('users.favorites');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        $user = User::withCount('articles')->whereName($slug)->firstOrFail();

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
