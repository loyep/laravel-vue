<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Model;
use App\Models\User;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
     * UsersController constructor.
     *
     * @param ValidationFactory $validation
     */
    public function __construct(ValidationFactory $validation)
    {
        $this->model = app(User::class);
        $this->validation = $validation;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return UserResource
     */
    public function index(Request $request)
    {
        $users = $this->model
            ->withCount('posts')
            ->when($name = $request->get('name'), function ($query) use ($name) {
                $query->where('name', 'like', '%'.$name.'%');
            })
            ->paginate($request->get('per_page', 10));

        return new UserResource($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $data = array_merge($request->all(), [
            'password' => Hash::make($request->get('password')),
        ]);

        $user = $this->model->create($data);

        $response = [
            'message' => 'User created.',
            'data'    => new UserResource($user),
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return UserResource
     */
    public function show($id)
    {
        $user = $this->model->find($id);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->model->findOrFail($id);
        $data = array_merge($request->all(), [
            'password' => Hash::make($request->get('password')),
        ]);
        $user->fill($data);
        $user->save();
        $response = [
            'message' => 'User updated.',
            'data'    => $user->toArray(),
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $ids
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($ids)
    {
        $this->model->destroy($ids);

        return response()->json([
            'message' => 'Delete success',
        ]);
    }

    /**
     * @param Request $request
     *
     * @return UserResource
     */
    public function profile(Request $request)
    {
        $user = User::find(1);
//        $user->roles = ['admin'];

        return new UserResource($user);
    }
}
