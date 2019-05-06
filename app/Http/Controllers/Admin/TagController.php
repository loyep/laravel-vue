<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

/**
 * Class TagController.
 */
class TagController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $model;

    /**
     * The validation factory implementation.
     *
     * @var \Illuminate\Contracts\Validation\Factory
     */
    protected $validation;

    /**
     * ArticleController constructor.
     *
     * @param ValidationFactory $validation
     */
    public function __construct(ValidationFactory $validation)
    {
        $this->model = app(Tag::class);
        $this->validation = $validation;
    }

    /**
     * Display a listing of the resource.
     *
     * @param TagRequest $request
     *
     * @return TagResource
     */
    public function index(TagRequest $request)
    {
        $tags = $this->model
            ->withCount('articles')
            ->when($keywords = $request->get('keywords'), function ($query) use ($keywords) {
                $query->where('name', 'like', '%'.$keywords.'%');
            })
            ->orderByDesc('updated_at')->paginate($request->get('per_page', 10));

        return new TagResource($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TagRequest $request)
    {
        $tag = $this->model->create($request->all());

        $response = [
            'message' => 'Tag created.',
            'data'    => new TagResource($tag),
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return TagResource
     */
    public function show(int $id)
    {
        $tag = $this->model->find($id);

        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param int        $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TagRequest $request, $id)
    {
        $tag = $this->model->findOrFail($id);
        $tag->fill($request->all());
        $tag->save();
        $response = [
            'message' => 'Tag updated.',
            'data'    => $tag->toArray(),
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string|int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->model->destroy($id);

        return response()->json([
            'message' => 'Delete success',
        ]);
    }
}
