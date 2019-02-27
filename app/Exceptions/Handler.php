<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        // 检查token
        if($exception instanceof AuthenticationException) {
            abort(401, $exception->getMessage());
        }
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
            $error = $this->convertExceptionToResponse($exception);
            $response['message'] = $exception->getMessage();
            $response['status_code'] = $error->getStatusCode();
            if(config('app.debug')) {
                if($error->getStatusCode() >= 500) {
                    $response['debug']['line'] = $exception->getLine(); // error line
                    $response['debug']['file'] = $exception->getFile(); // error file
                    $response['debug']['class'] = get_class($exception); // error position
                    $response['debug']['trace'] = explode("\n", $exception->getTraceAsString()); //Error stack
                }
            }
            // response api
            return response()->json($response, $error->getStatusCode());
        } else {
            // response web
            return parent::render($request, $exception);
        }
    }
}
