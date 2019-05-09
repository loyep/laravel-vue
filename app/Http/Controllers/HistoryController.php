<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

/**
 * Class SearchController.
 */
class HistoryController extends Controller
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
        $history = collect(explode(',', Cookie::get('history')))->filter(function ($item) {
            return !empty($item);
        })->map(function ($item) {
            return (int) $item;
        });

        $articles = Article::with('category')
            ->orderByDesc('published_at')
            ->whereIn('id', $history)
            ->paginate();

        if ($request->isMethod('post')) {
            return view('components.card.article-list', compact('articles'));
        }

        Prism::setTitle('最近浏览');

        return view('history', compact('articles'));
    }
}
