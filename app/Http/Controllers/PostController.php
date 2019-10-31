<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

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
            $post = Post::with(['category', 'tags', 'user', 'content', 'comments'])
                ->where('slug', $slug)
                ->published()
                ->recent()
                ->firstOrFail();

            $key = 'post|'.$post->id.'|'.$request->ip();
            $isLiked = Cache::has($key);
            $post->increment('views_count');

            $historyKey = 'post_history|'.$request->ip();
            $history = Cache::get($historyKey, []);
            if (!Arr::has($history, $post->id)) {
                $history[] = $post->id;
                Cache::forever($historyKey, $history);
            }

            $title = $post->title;
            return view('posts.show', compact('post', 'isLiked', 'title'));
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }
}
