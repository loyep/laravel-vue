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
            return response()->json([
                'data' => $posts,
            ]);
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
            $post = Post::with('content', 'category', 'tags', 'user')->where('slug', $slug)->firstOrFail();
            $post->increment('views');
            $post->post_layout = 'two';
            $author = $post->user;
            $category = $post->category;
            $is_like = $post->isLiked();
            $content = $post->content->content();
            $post->excerpt = $this->getExcerptFromContent($content, 120);
            Prism::setShare($post->perm_link, $post->title, $post->excerpt, $post->image);
            Prism::setTitle($post->title.' - '.config('prism.name'));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return view('posts.show', compact('post', 'author', 'category', 'is_like', 'content'));
    }

    public function getExcerptFromContent($content, $count)
    {
        $content = preg_replace('@<(.*?)>@is', '', $content);
        $content = str_replace(PHP_EOL, '', $content);
        $content = preg_replace('# #', '', $content);
        $res = mb_substr($content, 0, $count, 'UTF-8');
        if (mb_strlen($content, 'UTF-8') > $count) {
            $res = $res.'...';
        }

        return $res;
    }

    public function like($slug)
    {
        try {
            $post = Post::with('content')->where('slug', $slug)->firstOrFail();
            $post->increment('likes');

            return response([
                'result' => true,
                'data'   => $post->likes,
            ])->cookie($post->getLikeKey(), true, 9999999);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
