<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = Article::orderByDesc('published_at')->paginate();

        $articles->load([
            'category',
            'user',
        ]);

        if ($request->ajax()) {
            return view('components.card.article-list', compact('articles'));
        }

        return view('home', compact('articles'));
    }
}
