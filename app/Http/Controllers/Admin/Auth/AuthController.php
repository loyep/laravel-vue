<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Services\AuthService;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class AuthController
 * @package App\Http\Controllers\Admin\Auth
 */
class AuthController extends BaseController
{
    use ThrottlesLogins;

    /**
     * @var AuthService $auth
     */
    protected $auth;

    /**
     * AuthController constructor.
     * @param AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }
}
