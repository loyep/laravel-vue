<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tag = Tag::withCount('posts')->where('slug', $slug)->first();
//        $posts = Post::where('category_id', $category->id)->paginate(16);

        $posts = collect([]);
        Prism::setTitle($tag->name);
        return view('categories.show', compact('posts', 'tag'));
    }
}
