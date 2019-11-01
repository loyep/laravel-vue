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

        $posts = $author->posts()->with('category')->paginate(16);

        return view('authors.show', compact('author', 'posts'));
    }
}
