<?php

namespace App\Http\Controllers\Admin\Api\Users;

use App\Models\Admin\Api\User;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\User\UserResource;

class UserController extends Controller
{
    /**
     * @param $id
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($id, User $user)
    {
        $model = $user->findOrFail($id);
        $response = new UserResource($model);
        return response()->json($response)->setStatusCode(200);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(User $user)
    {
        $userData = $user->paginate();
        return response()->json($userData)->setStatusCode(200);
    }
}
