<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Models\Model;
use App\Models\Post;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * The validation factory implementation.
     *
     * @var \Illuminate\Contracts\Validation\Factory
     */
    protected $validation;

    /**
     * PostController constructor.
     *
     * @param ValidationFactory $validation
     */
    public function __construct(ValidationFactory $validation)
    {
        $this->model = app(Post::class);
        $this->validation = $validation;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return PostResource
     */
    public function index(Request $request)
    {
        $this->model->with('tags:id,name', 'user:id,name', 'category:id,name')->withCount('comments');

        $conditions = [];
        if ($keywords = $request->get('keywords')) {
            $conditions[] = ['title', 'like', '%'.$keywords.'%'];
        }

        if ($status = $request->get('status')) {
            $conditions[] = ['status', $status];
        }

        if ($category_id = $request->get('category_id')) {
            $conditions[] = ['category_id', $category_id];
        }

        $posts = $this->model->orderByDesc('published_at', 'desc')->where($conditions)->paginate($request->get('per_page', 10));

        return new PostResource($posts);
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
