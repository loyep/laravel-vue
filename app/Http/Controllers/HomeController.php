<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
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
        $content = Cache::remember('qrcode|' . md5($request->fullUrl()), -300, function () use ($request) {
            $size = $request->size ?? '320';
            $margin = $request->margin ?? 0;
            $url = $request->url ?? $request->url();
            return QrCode::format('png')->merge('/public/favicon.png', 0.2)->errorCorrection('H')->size($size)->margin($margin)->generate($url);
        });
        return response($content, 200, [
            'Content-Type' => 'image/png',
        ]);
    }
}
