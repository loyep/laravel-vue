<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Article;
use App\Models\Tag;

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
     * @param string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tag = Tag::withCount('articles')->where('slug', $slug)->first();
        $articles = Article::whereHas('tags', function ($query) use ($tag) {
            $query->where('id', $tag->id);
        })->paginate();

        $topArticles = Article::whereHas('tags', function ($query) use ($tag) {
            $query->where('id', $tag->id);
        })->orderByDesc('published_at')->take(4)->get();

        Prism::setTitle($tag->name);

        return view('tags.show', compact('articles', 'tag', 'topArticles'));
    }
}
