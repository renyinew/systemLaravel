<?php

namespace App\Http\Controllers\Admin\Api\Users;

use App\Models\Admin\Api\User;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Requests\Admin\Api\Users\StoreUserPermissionUpdate;

class PermissionController extends Controller
{
    /**
     * @param $id
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists($id, User $user)
    {
        $user = $user->findOrFail($id);
        $roles = $user->getRoleNames();
        $permissions = $user->getAllPermissions();
        return response()->json([
            'roles' => $roles,
            'permissions' => $permissions
        ])->setStatusCode(200);
    }

    /**
     * @param $id
     * @param StoreUserPermissionUpdate $update
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function set($id, StoreUserPermissionUpdate $update, User $user)
    {
        $user = $user->findOrFail($id);
        $roles = $user->syncRoles($update->all());
        return response()->json($roles)->setStatusCode(204);
    }
}
