<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Authenticate extends Middleware
{
    /**
     * @var string
     */
    protected $token;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string[] ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        try {
            $this->authenticate($request, $guards);
            $this->refreshToken($request);
        } catch (AuthenticationException $authenticationException) {
            throw new AuthenticationException(
                '登录超时，请重新登录.', $guards, $this->redirectTo($request)
            );
        }

        return $this->setAuthenticationHeader($next($request));
    }

    /**
     * Set the authentication header.
     *
     * @param  \Illuminate\Http\Response|\Illuminate\Http\JsonResponse $response
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
     * @param Request $request
     */
    protected function refreshToken(Request $request)
    {
        try {
            if (!$this->guard()->parser()->setRequest($request)->hasToken()) {
                return;
            }

            if ($this->guard()->getPayload()->get('exp') - time() < 3600) {
                $this->token = $this->guard()->refresh();
                $this->guard()->setToken($this->token);
            }
        } catch (\Exception $exception) {
            throw new UnauthorizedHttpException(
                '登录超时，请重新登录.'
            );
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
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

}
