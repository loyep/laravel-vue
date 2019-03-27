<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Controller;
use App\Models\User;
use App\Support\Helper;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:api');
    }

    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed                    $user
     *
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $token = $this->guard()->getToken()->get();
        $expiration = $this->guard()->getPayload()->get('exp') - time();

        return response()->json([
                'data' => [
                    'user'       => $user,
                    'token'      => $token,
                    'expires_in' => $expiration,
                ],
                'message' => '',
            ])
            ->header('authorization', $token);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);

            return $this->registered($request, $user);
        } catch (ValidationException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->errors(),
            ]);
        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Tymon\JWTAuth\JWTAuth
     */
    protected function guard()
    {
        return Auth::guard('api');
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
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'         => $data['name'],
            'display_name' => $data['name'],
            'email'        => $data['email'],
            'avatar'       => Helper::getAvatar($data['email']),
            'password'     => Hash::make($data['password']),
        ]);
    }
}
