<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $this->model = app(Role::class);
        $this->validation = $validation;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return RoleResource
     */
    public function index(Request $request)
    {
        $roles = $this->model
//            ->when($keywords = $request->get('keywords'), function ($query) use ($keywords) {
//                $query->where('key', 'like', '%' . $keywords . '%');
//            })
            ->orderByDesc('updated_at')->paginate($request->get('per_page', 10));

        return new RoleResource($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
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
     * @return \Illuminate\Http\JsonResponse
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
     * @return \Illuminate\Http\JsonResponse
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
    }
}
