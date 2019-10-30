<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
     * @param Request $request
     * @param string  $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $slug)
    {
//        Category::addGlobalScope(new OrderDescScope());
//        Post::addGlobalScope(new PublishOrderScope());
        $category = Category::withCount('posts')->whereSlug($slug)->firstOrFail();
        $topCount = in_array($category->list_style, ['plain', 'medium']) ? 3 : 4;
//        $topArticles = Post::whereCategoryId($category->id)
//            ->where('order', '>', 0)
//            ->take($topCount)
//            ->get();
        $posts = Post::with('category')
            ->where('category_id', $category->id)
//            ->when($topArticles->isNotEmpty(), function ($query) use ($topArticles) {
//                $query->whereNotIn('id', $topArticles->pluck('id'));
//            })
            ->paginate();

//        Blog::setTitle($category->name);

        return view('categories.show', compact('posts', 'category'));
    }
}
