<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $category = Category::withCount('posts')->whereSlug($slug)->firstOrFail();
//        $topCount = in_array($category->list_style, ['plain', 'medium']) ? 3 : 4;
        $posts = $category->posts()->with('category')->paginate();

        return view('categories.show', compact('posts', 'category'));
    }
}
