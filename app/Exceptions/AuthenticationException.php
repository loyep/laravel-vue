<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthenticationException extends UnauthorizedHttpException
{
    /**
     * Render the exception.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response()->json(['message' => $this->getMessage()], 401);
    }
}
