<?php

namespace App\Http\Controllers\Admin\Api\Permission;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Requests\Admin\Api\Permission\StoreRolePermissionCreate;


/**
 * role and permission
 * Class RoleAndPermissionController
 * @package App\Http\Controllers\Admin\Api\Permission
 */
class RolePermissionController extends Controller
{
    /**
     * @param $role_id
     * @param StoreRolePermissionCreate $create
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($role_id, StoreRolePermissionCreate $create, Role $role)
    {
        $role = $role->findById($role_id);
        $role->givePermissionTo($create->all());
        return response()->json()->setStatusCode(204);
    }

    public function creates($role_id, StoreRolePermissionCreate $create, Role $role)
    {
        $role = $role->findById($role_id);
        $role->givePermissionTo($create->all());
        return response()->json()->setStatusCode(204);
    }

    /**
     * @param $role_id
     * @param Role $role
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($role_id, Role $role,Request $request)
    {
        $user = $request->user();
        $permiss= $user->getPermissionsViaRoles();
        return response()->json($permiss)->setStatusCode(200);
    }
}
