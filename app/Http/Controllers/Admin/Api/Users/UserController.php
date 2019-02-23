<?php

namespace App\Http\Controllers\Admin\Api\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Users\MeResource;

class UserController extends Controller
{
    /**
     * 返回当前登录用户
     * @return MeResource
     */
    public function me()
    {
        return new MeResource($this->user());
    }
}
