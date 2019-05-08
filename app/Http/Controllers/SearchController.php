<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Search\Search;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SearchController.
 */
class SearchController extends Controller
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
        $query = $request->q;
        $articles = Article::where('title', 'like', '%' . $query . '%')->paginate();

        $articles->load([
            'category',
            'user',
        ]);

        if ($request->ajax()) {
            return view('components.card.article-list', compact('articles'));
        }

        $search = Search::where('query', $query)->first();
        if (!$search) {
            $search = new Search();
            $search->query = $query;
            $search->save();
        }

        if ($articles->count() > 0) {
            $search->increment('search_count');
        }

        return view('search', compact('q', 'articles'));
    }
}
