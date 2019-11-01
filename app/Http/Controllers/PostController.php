<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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

    public function like(Request $request)
    {
        $post = Post::find($request->id);

        $items = Cache::get($post->likedKey(), []);
        $idx = array_search($post->id, $items);
        if ($idx === false) {
            $items[] = $post->id;
        } else {
            array_splice($items, $idx, 1);
        }
        Cache::forever($post->likedKey(), $items);

        $isLiked = array_search($post->id, $items) !== false;
        $post->increment('likes_count', $isLiked ? 1 : -1);
        $likes_count = $post->likes_count;
        return response()->json([
            'is_liked'    => $isLiked,
            'likes_count' => $likes_count,
        ]);
    }

    public function favorite(Request $request)
    {
        $post = Post::find($request->id);
        $user = $request->user();
        $is_favorited = $post->favorites()->where('user_id', $user->id)->exists();
        $post->favorites()->toggle([$user->id]);

        return [
            'is_favorited'    => !$is_favorited,
            'favorites_count' => $post->favorites()->count()
        ];
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
                ->withCount(['comments', 'favorites'])
                ->where('slug', $slug)
                ->published()
                ->recent()
                ->firstOrFail();

            $is_favorited = false;
            if ($user = Auth::user()) {
                $is_favorited = $post->favorites()->where('user_id', $user->id)->exists();
            }
            $isLiked = array_search($post->id, Cache::get($post->likedKey(), [])) !== false;
            $post->increment('views_count');

            $historyKey = 'post_history|'.$request->ip();
            $history = Cache::get($historyKey, []);
            if (!Arr::has($history, $post->id)) {
                $history[] = $post->id;
                Cache::forever($historyKey, $history);
            }

            $title = $post->title;
            return view('posts.show', compact('post', 'isLiked', 'title', 'is_favorited'));
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }
}
