<?php

namespace App\Http\Controllers\Admin\Api\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Users\MeResource;

/**
 * @Resource("User")
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
    public function me()
    {
        return new MeResource($this->user());
    }
}
