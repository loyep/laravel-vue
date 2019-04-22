<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;

/**
 * Class AuthService.
 */
class AuthService extends BaseService
{
    /**
     * @var JWTAuth
     */
    protected $jwtAuth;

    /**
     * @var AuthManager
     */
    protected $auth;

    /**
     * AuthController constructor.
     *
     * @param JWTAuth     $jwtAuth
     * @param AuthManager $auth
     */
    public function __construct(JWTAuth $jwtAuth, AuthManager $auth)
    {
        $this->jwtAuth = $jwtAuth;
        $this->auth = $auth;
    }

    /**
     * @param Request $request
     */
    public function logout(Request $request)
    {
        // Web
        $this->auth->logout();
        $request->session()->invalidate();

        // Api
        if ($this->jwtAuth->setRequest($request)->getToken()) {
            $this->jwtAuth->invalidate(false);
            $this->jwtAuth->unsetToken();
        }
    }

    /**
     * @param User $user
     */
    public function login(User $user)
    {
        $this->auth->login($user);

        $this->jwtAuth->login($user);
    }

    /**
     * @throws TokenInvalidException
     *
     * @return string
     */
    public function tokenRefresh()
    {
        try {
            return $this->jwtAuth->refresh();
        } catch (TokenInvalidException $e) {
            throw $e;
        }
    }

    public function checkForToken(Request $request)
    {
        if (!$this->jwtAuth->parser()->setRequest($request)->hasToken()) {
            throw new UnauthorizedHttpException('jwt-auth', 'Token not provided');
        }
    }

    public function check()
    {
        return $this->jwtAuth->parseToken()->authenticate();
    }

    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @param mixed $id
     *
     * @return bool
     */
    public function onceUsingId($id)
    {
        return $this->jwtAuth->onceUsingId($id);
    }

    /**
     * @param array $credentials
     * @param bool  $remember
     *
     * @return bool
     */
    public function attempt(array $credentials, $remember = false)
    {
        $token = $this->jwtAuth->attempt(
            $credentials
        );

        $user = $this->auth->attempt(
            $credentials, $remember
        );

        if (!empty($token) || !empty($user)) {
            session()->regenerate();
            $this->jwtAuth->setToken($token);

            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->jwtAuth->getToken()->get();
    }

    /**
     * @return User|null
     */
    public function user(): ?User
    {
        return $this->auth->user();
    }
}
