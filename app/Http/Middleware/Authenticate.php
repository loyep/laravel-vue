<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthenticationException as PrismAuthenticationException;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticationMiddleware;
use Illuminate\Http\Request;

class Authenticate extends BaseAuthenticationMiddleware
{
    /**
     * @var string
     */
    protected $token;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string[]                 ...$guards
     *
     * @throws \Illuminate\Auth\AuthenticationException
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        try {
            $this->authenticate($request, $guards);
            $this->refreshToken($request, $guards);
        } catch (AuthenticationException $e) {
            throw new PrismAuthenticationException(
                '登录超时，请重新登录.', $e->guards()
            );
        }

        return $this->setAuthenticationHeader($next($request));
    }

    /**
     * @param Request $request
     * @param array   $guards
     *
     * @throws AuthenticationException
     *
     * @return mixed|null
     */
    protected function refreshToken(Request $request, array $guards)
    {
        if ($this->guard()->parser()->setRequest($request)->hasToken()) {
            if ($this->guard()->getPayload()->get('exp') - time() >= config('admin.token_exp')) {
                return;
            } else {
                return tap($this->guard()->refresh(), function ($token) {
                    $this->token = $token;
                    $this->guard()->setToken($token);
                });
            }
        }

        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return $this->auth->guard('api');
    }

    /**
     * Set the authentication header.
     *
     * @param \Illuminate\Http\Response|\Illuminate\Http\JsonResponse $response
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    protected function setAuthenticationHeader($response)
    {
        if (!empty($this->token)) {
            $response->headers->set('Authorization', $this->token);
        }

        return $response;
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
