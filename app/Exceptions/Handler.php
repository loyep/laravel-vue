<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     *
     * @throws Exception
     *
     * @return mixed|void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // 参数验证错误的异常，我们需要返回 400 的 http code 和一句错误信息
        if ($exception instanceof ValidationException) {
            return new Response([
                'status_code' => $exception->status,
                'message' => $exception->errorBag,
                'errors' => $exception->errors()
            ]);
        }

        // 用户认证的异常，我们需要返回 401 的 http code 和错误信息
        if ($exception instanceof UnauthorizedHttpException) {
            return new Response([
                'status_code' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);
        }

        return parent::render($request, $exception);
    }
}
