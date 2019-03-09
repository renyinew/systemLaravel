<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// token 验证
use Illuminate\Auth\AuthenticationException;
// 表单验证
use Illuminate\Validation\ValidationException;

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
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // Determine whether it is an API interface
        if($request->is('api/*')) {

            $response = [];
            $response['status_code'] = 500;

            // token错误信息
            if($exception instanceof AuthenticationException) {
                $response['message'] = 'Wrong authorization token.';
                $response['status_code'] = 401;
            }

            // 表单验证
            if($exception instanceof ValidationException) {
                $response['message'] = 'Data error verification failed.';
                $response['errors'] = $exception->errors();
                $response['status_code'] = 422;
            }

            //

            // debug
            if(config('app.debug')) {
                $response['debug']['message'] = $exception->getMessage();
                $response['debug']['line'] = $exception->getLine(); // error line
                $response['debug']['file'] = $exception->getFile(); // error file
                $response['debug']['class'] = get_class($exception); // error position
                $response['debug']['trace'] = explode("\n", $exception->getTraceAsString()); //Error stack
            }
            // response api
            return response()->json($response)->setStatusCode($response['status_code']);
        } else {
            // response web
            return parent::render($request, $exception);
        }
    }
}
