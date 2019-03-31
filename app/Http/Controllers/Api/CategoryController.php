<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
        $this->model = app(Category::class);
        $this->validation = $validation;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return CategoryResource
     */
    public function index(Request $request)
    {
        $categories = $this->model
            ->withCount('posts')
            ->when($keywords = $request->get('keywords'), function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%')->orWhere('description', 'like', '%' . $keywords . '%');
            })
            ->orderByDesc('updated_at')->paginate($request->get('per_page', 10));

        return new CategoryResource($categories);
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

        $category = $this->model->create($request->all());

        $response = [
            'message' => 'Category created.',
            'data'    => new CategoryResource($category),
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return CategoryResource
     */
    public function show($id)
    {
        $category = $this->model->find($id);

        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->model->findOrFail($id);
        $category->fill($request->all());
        $category->save();
        $response = [
            'message' => 'Category updated.',
            'data' => $category->toArray(),
        ];

        return response()->json($response);
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
