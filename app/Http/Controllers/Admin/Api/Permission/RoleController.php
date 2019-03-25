<?php

namespace App\Http\Controllers\Admin\Api\Permission;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Requests\Admin\Api\Permission\StoreRoleUpdate;
use App\Http\Requests\Admin\Api\Permission\StoreRoleCreate;

class RoleController extends Controller
{
    /**
     * @param StoreRoleCreate $create
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(StoreRoleCreate $create, Role $role)
    {
        $role->create($create->all());
        return response()->json()->setStatusCode(201);
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Role $role)
    {
        $role = $role->get();
        return response()->json($role)->setStatusCode(200);
    }

    /**
     * @param $id
     * @param StoreRoleUpdate $update
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreRoleUpdate $update, Role $role)
    {
        $role->findOrFail($id)->update($update->all());
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Role $role)
    {
        $role->findOrFail($id)->delete();
        return response()->json()->setStatusCode(204);
    }
}
