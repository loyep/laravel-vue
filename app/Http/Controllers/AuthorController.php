<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $author = User::withCount('posts')->whereName($slug)->firstOrFail();

        $posts = $author->posts()->with('category')->paginate();

//        $list = view('components.posts.small', compact('posts'));
        return view('authors.show', compact('author', 'posts'));
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
