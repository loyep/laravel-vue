<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
use App\Models\Setting;
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

//            $setting = new Setting();
//            $setting->key = 'post_ad';
//            $setting->group = 'ad';
//            $setting->display_name = '文章广告';
//            $setting->value = json_encode([
//                'image' => '/app/images/bg.jpg',
//                'code' => '',
//                'link' => 'https://loyep.com',
//                'type' => 'image'
//            ]);
//            $setting->type = 'text';
//            $setting->save();

            $post = Post::with('content', 'category', 'tags', 'user')->where('slug', $slug)->firstOrFail();
            $post->increment('views');
            $post->post_layout = 'two';
            $author = $post->user;
            $category = $post->category;
            $is_like = $post->isLiked();
            $content = $post->content->content();
            $this->updateViewHistory($request, $post->id);
            $post->excerpt = $this->getExcerptFromContent($content, 120);
//            PrismApp::setShare($post->perm_link, $post->title, $post->excerpt, $post->image);
            Prism::setTitle($post->title);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return view('posts.show', compact('post', 'author', 'category', 'is_like', 'content'));
    }

    protected function updateViewHistory(Request $request, $id)
    {
        $history = $request->cookie('view_history');
        if (is_null($history)) {
            $history = [$id];
        } else {
            $history = json_decode($history);
            $history[] = $id;
            $history = array_unique($history);
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

    public function like($slug)
    {
        try {
            $post = Post::with('content')->where('slug', $slug)->firstOrFail();
            $post->increment('likes');

            return response([
                'result' => true,
                'data' => $post->likes,
            ])->cookie($post->getLikeKey(), true, 9999999);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
