<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * 启用维护模式时应该可以访问的URI。
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
