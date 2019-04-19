<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Support\Helper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends AuthController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->auth->login($user);

        return $this->registered($request, $user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'         => $data['name'],
            'display_name' => $data['name'],
            'email'        => $data['email'],
            'avatar'       => Helper::getAvatar($data['email']),
            'password'     => Hash::make($data['password']),
        ]);

        return $user;
    }

    /**
     * The user has been registered.
     *
     * @param Request $request
     * @param mixed   $user
     *
     * @return JsonResponse
     */
    protected function registered(Request $request, $user)
    {
        $token = $this->auth->getToken();

        return response()
            ->json([
                'user'       => $user,
                'token'      => $token,
            ])
            ->header('authorization', $token);
    }
}
