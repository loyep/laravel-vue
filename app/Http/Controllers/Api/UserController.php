<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Support\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
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
        $users = User::paginate($request->get('per_page', 10));

        $response = [
            'message' => 'User created.',
            'data'    => $users,
        ];

        return response()->json($response);
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
        try {
            $request->validate([
                'email'        => 'required|unique:users|string',
                'name'         => 'required|unique:users|string',
                'display_name' => 'unique:users|string',
            ]);

            $user = new User($request->all());
            $user->avatar = Helper::getAvatar($user->email);
            $user->save();
            $response = [
                'message' => 'User created.',
                'data'    => $user->toArray(),
            ];

            return response()->json($response);
        } catch (ValidationException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->errors(),
            ]);
        }
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

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {
        $user = Auth::user();
        $user->roles = ['admin'];

        return response()->json([
            'message' => '',
            'data'    => $user,
        ]);
    }
}
