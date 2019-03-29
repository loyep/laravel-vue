<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use ThrottlesLogins;

    /**
     * @var \Tymon\JWTAuth\Contracts\Providers\Auth
     */
    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->auth = Auth::guard('api');
        $this->middleware('guest:api')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return response([
            'result'  => true,
            'message' => '',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $token = $this->guard()->attempt(
            $this->credentials($request)
        );

        if ($token) {
            $this->guard()->setToken($token);

            return true;
        }

        return false;
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Tymon\JWTAuth\Contracts\Providers\Auth
     */
    protected function guard()
    {
        return $this->auth;
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function credentials(Request $request)
    {
        $username = $request->input($this->username());
        $type = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return [
            $type      => $username,
            'password' => $request->input('password'),
        ];
    }

    /**
     * Get the failed login response instance.
     *
     * @param Request $request
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $token = $this->guard()->getToken()->get();
        $expiration = $this->guard()->getPayload()->get('exp') - time();

        $user = $this->guard()->user();
        $welcome = $this->generateWelcome($user);

        return response()
            ->json([
                'token'      => 'Bearer '.$token,
                'expires_in' => $expiration,
                'welcome'    => $welcome,
            ])
            ->header('authorization', 'Bearer '.$token);
    }

    /**
     * @param $user
     *
     * @return string
     */
    protected function generateWelcome($user)
    {
        $welcome = Str::ucfirst($user->display_name).', '.self::getPeriodOfTime().'好!';

        return $welcome;
    }

    public static function getPeriodOfTime($hour = null)
    {
        $hour = $hour ? $hour : (int) date('G', time());
        $period = '';
        if (0 <= $hour && 6 > $hour) {
            $period = '凌晨';
        } elseif (6 <= $hour && 8 > $hour) {
            $period = '早上';
        } elseif (8 <= $hour && 11 > $hour) {
            $period = '上午';
        } elseif (11 <= $hour && 13 > $hour) {
            $period = '中午';
        } elseif (13 <= $hour && 15 > $hour) {
            $period = '响午';
        } elseif (15 <= $hour && 18 > $hour) {
            $period = '下午';
        } elseif (18 <= $hour && 20 > $hour) {
            $period = '傍晚';
        } elseif (20 <= $hour && 22 > $hour) {
            $period = '晚上';
        } elseif (22 <= $hour && 23 >= $hour) {
            $period = '深夜';
        }

        return $period;
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
//        if ($this->hasTooManyLoginAttempts($request)) {
//            $this->fireLockoutEvent($request);
//
//            return $this->sendLockoutResponse($request);
//        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
//        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password'        => 'required|string',
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed                    $user
     *
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * The user has logged out of the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }
}
