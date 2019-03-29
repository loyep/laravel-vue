<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SettingRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Model;
use App\Models\User;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->model = User::class;
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
        $users = $this->model->paginate($request->get('per_page', 10));

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
        $this->validation->make($request->all(), [
            //
        ])->validate();

        $user = $this->model->create($request->all());

        $response = [
            'message' => 'User created.',
            'data'    => $user->toArray(),
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
     * @param SettingRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SettingRequest $request, $id)
    {
        $user = $this->model->update($request->all(), $id);
        $response = [
            'message' => 'User updated.',
            'data'    => $user->toArray(),
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $deleted = $this->model->findOrFail($id);
        $deleted->delete();

        return response()->json([
            'message' => 'User deleted.',
            'deleted' => $deleted,
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
