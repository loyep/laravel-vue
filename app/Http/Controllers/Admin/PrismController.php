<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Prism;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrismController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $config = [
            'base'           => Prism::path(),
            'name'           => Prism::getTitle(),
            'description'    => '美好源于热爱',
            'setting_drawer' => true,
        ];

        return view('dashboard.index', compact('config'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function statistics(Request $request)
    {
        $users_count = User::all()->count();
        $categories_count = Category::all()->count();
        $articles_count = Article::all()->count();
        $tags_count = Tag::all()->count();

        $range = Carbon::now()->subDays(7);

        $stats = User::where('created_at', '>=', 1)
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value'),
            ])->first();

        $user_trend = 0;
        Log::info($stats);
        if (!empty($stats)) {
            $user_trend = $stats->value / $users_count;
        }

        $statistics = [
            'user' => [
                'total'     => $users_count,
                'increased' => !empty($stats) ? $stats->value : 0,
                'title'     => '用户数',
                'trend'     => 'up',
                'remark'    => sprintf('%01.2f', $user_trend * 100).'%',
            ],
            'article' => [
                'title'  => '文章数',
                'total'  => $articles_count,
                'trend'  => '',
                'remark' => '0%',
            ],
            'categories' => [
                'title'  => '分类数',
                'total'  => $categories_count,
                'trend'  => '',
                'remark' => '0%',
            ],
            'tags' => [
                'title'  => '标签数',
                'total'  => $tags_count,
                'trend'  => '',
                'remark' => '0%',
            ],
        ];

        return response()->json($statistics);
    }
}
