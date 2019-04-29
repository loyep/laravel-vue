<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Services\AuthService;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class AuthController.
 */
class AuthController extends BaseController
{
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
}
