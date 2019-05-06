<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CategoryService.
 */
class CategoryService extends BaseService
{
    /**
     * @param Request $request
     *
     * @return CategoryResource
     */
    public function paginate(Request $request)
    {
        $categories = Category::withCount('posts')
            ->when($keywords = $request->get('keywords'), function ($query) use ($keywords) {
                $query->where('name', 'like', '%'.$keywords.'%')->orWhere('description', 'like', '%'.$keywords.'%');
            })
            ->orderByDesc('updated_at')->paginate($request->get('per_page', 10));

        return new CategoryResource($categories);
    }

    /**
     * Display the specified resource.
     *
     * @param int|string $id
     *
     * @return CategoryResource
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return new CategoryResource($category);
    }

    /**
     * @param CategoryRequest $request
     *
     * @return JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());

        $response = [
            'message' => 'Category created.',
            'data'    => new CategoryResource($category),
        ];

        return response()->json($response);
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     *
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();
        $response = [
            'message' => 'Category updated.',
            'data'    => $category->toArray(),
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string|int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (is_string($id)) {
            $id = explode(',', $id);
        }

        Category::destroy($id);

        return response()->json([
            'message' => 'Delete success',
        ]);
    }
}
