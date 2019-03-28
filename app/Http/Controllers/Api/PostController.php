<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $builder = Post::with('tags:id,name', 'user:id,name', 'category:id,name')->withCount('comments');

        if ($keywords = $request->get('keywords')) {
            $builder = $builder->where('title', 'like', '%'.$keywords.'%');
        }

        if ($status = $request->get('status')) {
            $builder = $builder->where('status', $status);
        }

        if ($category_id = $request->get('category_id')) {
            $builder = $builder->where('category_id', $category_id);
        }

        $posts = $builder->orderByDesc('published_at')->paginate($request->get('per_page', 10));

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
