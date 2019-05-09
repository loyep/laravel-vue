<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Article;
use App\Traits\Likable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class ArticleController extends Controller
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
        $articles = Article::paginate();
        if ($request->expectsJson()) {
            return response()->json([
                'data' => $articles,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string  $slug
     *
     * @return Response
     */
    public function show(Request $request, $slug)
    {
        $template = 'default';
        try {
            $article = Article::with('content', 'category', 'tags', 'user')->where('slug', $slug)->firstOrFail();
            $article->increment('views_count');
            $content = $article->content->content();
            $this->updateViewHistory($request, $article->id);
            $article->excerpt = $this->getExcerptFromContent($content, 120);
            $template = $article->template ?? $template;
            Prism::setTitle($article->title);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        return view('articles.template.' . $template, compact('article', 'content', 'prevArticle', 'nextArticle'));
    }

    protected function updateViewHistory(Request $request, $id)
    {
        $history = collect(explode(',', Cookie::get('history')))->filter(function ($item) {
            return !empty($item);
        })->map(function ($item) {
            return (int) $item;
        });

        if (!$history->some($id)) {
            $history->push($id);
        }

        Cookie::queue('history', $history->implode(','), 99999);
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
            $article = Article::findOrFail($id);
            $article->like();

            return response([
                'result' => true,
                'data'   => [
                    'likesCount' => number_format($article->likes_count),
                    'isLike'     => $article->isLiked(),
                ],
            ]);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
