<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class CategoryController extends Controller
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
     * @return \Illuminate\Http\Response|View
     */
    public function show($slug)
    {
        $category = Category::withCount('posts')->where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->orderByDesc('published_at')->paginate(16);

        $topPosts = Post::withCount('comments')->with('user')->orderByDesc('published_at')->take(3)->get();

        return view('categories.show', compact('posts', 'category', 'topPosts'));
    }
}
