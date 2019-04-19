<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthenticationException;
use App\Services\AuthService;
use Closure;

/**
 * Class Authenticate
 * @package App\Http\Middleware
 */
class Authenticate
{

    /**
     * @var AuthService $auth
     */
    protected $auth;

    /**
     * Authenticate constructor.
     * @param AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     *
     * @return mixed
     * @throws AuthenticationException
     *
     */
    public function handle($request, Closure $next)
    {
        // 检查此次请求中是否带有 token，如果没有则抛出异常。
        $this->auth->checkForToken($request);

        // 使用 try 包裹，以捕捉 token 过期所抛出的 TokenExpiredException  异常
        try {
            // 检测用户的登录状态，如果正常则通过
            if ($this->auth->check()) {
                return $next($request);
            }

            throw new AuthenticationException('jwt-auth', '未登录');
        } catch (\Exception $exception) {
            // 此处捕获到了 token 过期所抛出的 TokenExpiredException 异常，我们在这里需要做的是刷新该用户的 token 并将它添加到响应头中
            try {

                // 刷新用户的 token
                $token = $this->auth->tokenRefresh();

                // 使用一次性登录以保证此次请求的成功
                $this->auth->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
            } catch (\Exception $exception) {
                // 如果捕获到此异常，即代表 refresh 也过期了，用户无法刷新令牌，需要重新登录。
                throw new AuthenticationException('jwt-auth', $exception->getMessage());
            }
        }

        // 在响应头中返回新的 token
        return $this->setAuthenticationHeader($next($request), $token);
    }

    /**
     * Set the authentication header.
     *
     * @param $response
     * @param null $token
     * @return mixed
     * @throws mixed
     */
    protected function setAuthenticationHeader($response, $token = null)
    {
        $token = $token ?: $this->auth->tokenRefresh();
        $response->headers->set('Authorization', 'Bearer ' . $token);

        return $response;
    }
}
