<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{

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

        $posts = Post::with('user')->where('user_id', $user->id)->paginate();
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
