<?php

namespace App\Http\Controllers\Admin\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Api\Controller;

class PermissionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $permissions = $request->user()->getAllPermissions();
        return response()->json($permissions)->setStatusCode(200);
    }
}
