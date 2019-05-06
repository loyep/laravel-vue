<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
     * @param string $slug
     *
     * @return Response
     */
    public function show($slug)
    {
        $category = Category::withCount('articles')->where('slug', $slug)->first();
        $articles = Article::where('category_id', $category->id)->orderByDesc('published_at')->paginate(16);

        $topArticles = Article::with('user')->orderByDesc('published_at')->take(4)->get();

        Prism::setTitle($category->name);

        return view('categories.show', compact('articles', 'category', 'topArticles'));
    }
}
