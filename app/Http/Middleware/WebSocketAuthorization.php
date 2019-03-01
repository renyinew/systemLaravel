<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Auth\AuthManager;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class WebSocketAuthorization
{
    protected $auth;

    protected $guard = 'api';

    public function __construct(Request $request, AuthManager $auth)
    {
        $this->auth = $auth->guard($this->guard);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     *
     */
    public function handle($request, Closure $next)
    {
        try {
            if ($user = $this->auth->user()) {
                $request->setUserResolver(function () use ($user) {
                    return $user;
                });
            }
        } catch (AuthenticationException $e) {

        }

        return $next($request);
    }
}
