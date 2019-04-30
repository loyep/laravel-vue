<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use App\Support\Helper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Loyep\Prism\Http\Controllers\Controller;

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
     * @var AuthService
     */
    protected $auth;

    /**
     * AuthController constructor.
     *
     * @param AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->all());

        $this->auth->login($user);

        return $this->registered($request, $user);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'display_name' => $data['name'],
            'email' => $data['email'],
            'avatar' => Helper::getAvatar($data['email']),
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    /**
     * The user has been registered.
     *
     * @param Request $request
     * @param mixed $user
     *
     * @return JsonResponse
     */
    protected function registered(Request $request, $user)
    {
        $token = $this->auth->getToken();

        return response()
            ->json([
                'user' => $user,
                'token' => $token,
            ])
            ->header('authorization', $token);
    }
}
