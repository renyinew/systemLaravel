<?php

namespace App\Http\Controllers\Admin\Api\Permission;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Requests\Admin\Api\Permission\StorePermissionCreate;
use App\Http\Requests\Admin\Api\Permission\StorePermissionUpdate;

class PermissionController extends Controller
{
    /**
     * @param StorePermissionCreate $create
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(StorePermissionCreate $create, Permission $permission)
    {
        $permission->create($create->all());
        return response()->json()->setStatusCode(201);
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Permission $permission)
    {
        $permission = $permission->get();
        return response()->json($permission)->setStatusCode(200);
    }

    /**
     * @param $id
     * @param StorePermissionUpdate $update
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StorePermissionUpdate $update, Permission $permission)
    {
        $permission->findOrFail($id)->update($update->all());
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Permission $permission)
    {
        $permission->findOrFail($id)->delete();
        return response()->json()->setStatusCode(204);
    }
}
