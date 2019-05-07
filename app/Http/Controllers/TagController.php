<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $tag = Tag::withCount('articles')->where('slug', $slug)->first();
        $articles = Article::whereHas('tags', function ($query) use ($tag) {
            $query->where('id', $tag->id);
        })->paginate();

        if ($request->isMethod('post')) {
            return view('components.card.article-list', compact('articles'));
        }

        $topArticles = Article::whereHas('tags', function ($query) use ($tag) {
            $query->where('id', $tag->id);
        })->orderByDesc('published_at')->take(4)->get();

        Prism::setTitle($tag->name);

        return view('tags.show', compact('articles', 'tag', 'topArticles'));
    }
}
