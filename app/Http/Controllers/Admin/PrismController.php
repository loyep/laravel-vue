<?php

namespace App\Http\Controllers\Admin;

use App\Facades\PrismAdmin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrismController extends ApiController
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $config = [
            'base'           => PrismAdmin::path(),
            'name'           => PrismAdmin::title(),
            'description'    => '美好源于热爱',
            'setting_drawer' => true,
        ];

        return view('admin.index', compact('config'));
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
        $posts_count = Post::all()->count();
        $tags_count = Tag::all()->count();

        $range = \Carbon\Carbon::now()->subDays(7);

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
            ],
//            [
//                'title' => '用户数',
//                'total' => $users_count,
//                'trend' => 'up',
//                'remark' => sprintf("%01.2f", $user_trend * 100) . '%',
//            ],
//            [
//                'title' => '文章数',
//                'total' => $posts_count,
//                'trend' => '',
//                'remark' => '0%'
//            ],
//            [
//                'title' => '分类数',
//                'total' => $categories_count,
//                'trend' => '',
//                'remark' => '0%'
//            ],
//            [
//                'title' => '标签数',
//                'total' => $tags_count,
//                'trend' => '',
//                'remark' => '0%'
//            ]
        ];

        return response()->json($statistics);
    }
}
