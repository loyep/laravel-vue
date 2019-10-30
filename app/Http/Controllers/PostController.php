<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     *
     * @param Request $request
     * @param string  $slug
     *
     * @return Response
     */
    public function show(Request $request, string $slug)
    {
        try {
            $post = Post::with('category', 'tags', 'user', 'content', 'comments')
                ->where('slug', $slug)
                ->published()
                ->recent()
                ->firstOrFail();
//            $likes = Cache::get($request->ip() . '(liked list)', []);
//            $isLiked = in_array($post->id, $likes);
            $isLiked = false;

            $post->increment('views_count');

//            Blog::setTitle($post->title);

            $title = $post->title;
            $adverts = collect([]);// Advert::all();
            return view('posts.show', compact('post', 'isLiked', 'adverts', 'title'));
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }
}
