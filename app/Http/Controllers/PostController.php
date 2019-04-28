<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
use App\Traits\Likable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
     * @param string $slug
     *
     * @return JsonResponse
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

        return view('posts.show', compact('post', 'author', 'category', 'is_like', 'content'));
    }

    protected function updateViewHistory(Request $request, $id)
    {
        $history = $request->cookie('view_history');
        if (empty($history)) {
            $history = [$id];
        } else {
            $history = json_decode($history);
            $history[] = $id;
            $history = array_unique($history);
            if (count($history) > 20) {
                $history = array_slice($history, -20, 20, false);
            }
        }
        Cookie::queue('view_history', json_encode($history), 102400);
    }

    public function getExcerptFromContent($content, $count)
    {
        $content = preg_replace('@<(.*?)>@is', '', $content);
        $content = str_replace(PHP_EOL, '', $content);
        $content = preg_replace('# #', '', $content);
        $res = mb_substr($content, 0, $count, 'UTF-8');
        if (mb_strlen($content, 'UTF-8') > $count) {
            $res = $res . '...';
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
                'data' => [
                    'likesCount' => $post->likes,
                    'isLike' => $post->isLiked()
                ],
            ]);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
