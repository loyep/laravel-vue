<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
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
     * @return Response
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
        $category = Category::withCount('articles')->where('slug', $slug)->first();
        $articles = Article::where('category_id', $category->id)->orderByDesc('published_at')->paginate();

        if ($request->ajax()) {
            return view('components.card.article-list', compact('articles'));
        }

        $topArticles = Article::with('user')->orderByDesc('published_at')->take(4)->get();

        Prism::setTitle($category->name);

        return view('categories.show', compact('articles', 'category', 'topArticles'));
    }
}
