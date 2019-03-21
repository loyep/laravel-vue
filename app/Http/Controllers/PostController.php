<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $posts = Post::paginate();
        if ($request->expectsJson()) {
            return response()->json($posts);
        }
//    return view()
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $post = Post::with('content')->where('slug', $slug)->firstOrFail();
            $author = $post->user;
            $category = $post->category;
            $is_like = $post->isLiked();
            $content = $post->content->body;
            if (empty($content)) {
                $content = Prism::markdown($post->content->markdown);
            }

            Prism::setShare($post->perm_link, $post->title, $post->excerpt, $post->image);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        return view('posts.show', compact('post', 'author', 'category', 'is_like', 'content'));
    }

    public function like($slug)
    {
        try {
            $post = Post::with('content')->where('slug', $slug)->firstOrFail();
            $post->likes = $post->likes + 1;
            $post->save();
            return response([
                'result' => true,
                'data' => $post->likes
            ])->cookie($post->getLikeKey(), true, 9999999);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
