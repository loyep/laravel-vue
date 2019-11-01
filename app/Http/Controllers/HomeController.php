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
        $url = $request->url ?? $request->url();
        $content = Cache::remember('qrcode|' . $url, 300, function () use ($url) {
            return QrCode::format('png')->size(320)->generate($url);
        });
        return response($content, 200, [
            'Content-Type' => 'image/png',
        ]);
    }
}
