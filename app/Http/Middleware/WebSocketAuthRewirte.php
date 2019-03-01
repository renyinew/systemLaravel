<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Contracts\Auth\Factory as Auth;

class WebSocketAuthRewirte
{
    /**
     * Handle an incoming request.
     * 处理URL传参过来的access_token.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->has('access_token')) {
            $access_token = 'Bearer ' . $request->input('access_token');
            $request->headers->add(['Authorization' => $access_token]);
        }
        return $next($request);
    }
}
