<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Response;
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
     * @return Response
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
     * @return Response
     */
    public function show($slug)
    {
        $category = Category::withCount('posts')->where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->orderByDesc('published_at')->paginate(16);

        $topPosts = Post::with('user')->orderByDesc('published_at')->take(4)->get();

        Prism::setTitle($category->name);

        return view('categories.show', compact('posts', 'category', 'topPosts'));
    }
}
