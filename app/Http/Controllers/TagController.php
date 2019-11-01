<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
        $tag = Tag::withCount('posts')->whereSlug($slug)->firstOrFail();
        $posts = $tag->posts()->with('category')->paginate(16);

        return view('tags.show', compact('posts', 'tag'));
    }

}
