<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        } catch (AuthenticationException $authenticationException) {
            if (!$this->refreshToken($request)) {
                throw new AuthenticationException(
                    '登录超时，请重新登录.', $guards, $this->redirectTo($request)
                );
            }
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
     * @return bool
     */
    protected function refreshToken(Request $request)
    {
        try {
            $auth = $this->auth->guard('api');
            if (!$auth->parser()->setRequest($request)->hasToken()) {
                return false;
            }

            $this->token = $auth->refresh();
            $auth->setToken($this->token);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        } finally {
            if (!empty($this->token)) {
                return true;
            } else {
                return false;
            }
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
}
