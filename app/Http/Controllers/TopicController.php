<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topTopics = Topic::withCount('posts')->take(4)->get();
        $topics = Topic::withCount('posts')->get();
        return view('topics.index', compact('topTopics', 'topics'));
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
        $topic = Topic::withCount('posts')->whereSlug($slug)->firstOrFail();
        $posts = $topic->posts()->with('category')->paginate();

        return view('topics.show', compact('posts', 'topic'));
    }
}
