<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController
{
    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $posts = Post::with(['category'])
            ->published()
            ->recent()
            ->paginate(16);

        $slides = Slide::take(5)->get();
        $slideBg = 'images/bg.jpg';
        return view('home', compact('slides', 'posts', 'slideBg'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function qrCode(Request $request)
    {
        $second = config('dawn.qrcode.expire', -1);
        $content = Cache::remember('qrcode|' . md5($request->fullUrl()), $second, function () use ($request) {
            $size = $request->size ?? config('dawn.qrcode.size', 200);
            $margin = $request->margin ?? config('dawn.qrcode.margin', 0);;
            $url = $request->url ?? $request->fullUrl();
            return QrCode::format(config('dawn.qrcode.format', 'png'))
                ->merge('/public/favicon.png', 0.25)
                ->size($size)
                ->margin($margin)
                ->generate($url);
        });

        return response($content, 200, [
            'Content-Type' => 'image/*',
        ]);
    }
}
