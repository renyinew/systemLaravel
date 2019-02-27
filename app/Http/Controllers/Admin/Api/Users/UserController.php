<?php

namespace App\Http\Controllers\Admin\Api\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Users\MeResource;

/**
 * @group User
 */
class UserController extends Controller
{
    /**
     * 返回当前登录用户
     * @Resource("User", uri="/user")
     * @Get("/user")
     * @Versions({"v1"})
     * @Request(headers={"Authorization": "Bearer xxx"})
     *
     * @return MeResource
     */
    public function me(Request $request)
    {
        $response = new MeResource($request->user());
        return response()->json($response)->setStatusCode(201);
    }
}
