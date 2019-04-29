<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
use App\Traits\Likable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use Likable;

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
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string  $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $slug)
    {
        try {
            $post = Post::with('content', 'category', 'tags', 'user')->where('slug', $slug)->firstOrFail();
            $post->increment('views');
            $content = $post->content->content();
            $this->updateViewHistory($request, $post->id);
            $post->excerpt = $this->getExcerptFromContent($content, 120);
            Prism::setTitle($post->title);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return view('posts.show', compact('post', 'content'));
    }

    protected function updateViewHistory(Request $request, $id)
    {
        $history = collect(explode(',', Cookie::get('view_history')))->filter(function ($item) {
            return !empty($item);
        })->map(function ($item) {
            return (int) $item;
        });

        if (!$history->some($id)) {
            $history->push($id);
        }

        Cookie::queue('view_history', $history->implode(','), 99999);
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

    public function like($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->like();

            return response([
                'result' => true,
                'data'   => [
                    'likesCount' => $post->likes,
                    'isLike'     => $post->isLiked(),
                ],
            ]);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
