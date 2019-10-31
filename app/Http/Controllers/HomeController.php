<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slide;
use Illuminate\Http\Request;

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
}
