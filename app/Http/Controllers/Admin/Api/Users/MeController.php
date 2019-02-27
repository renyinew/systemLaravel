<?php

namespace App\Http\Controllers\Admin\Api\Users;

use Illuminate\Http\Request;
use App\Models\Admin\Api\User;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Users\MeResource;

use App\Http\Requests\Admin\Api\Users\StoreMeUpdate;
use App\Http\Requests\Admin\Api\Users\StoreMePassword;

use Illuminate\Support\Facades\DB;

/**
 * @group User
 */
class MeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        $response = new MeResource($request->user());
        return response()->json($response)->setStatusCode(201);
    }

    /**
     * @param StoreMeUpdate $update
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, StoreMeUpdate $update)
    {
        $user = $request->user();
        $user->update($update->all());
        return response()->json()->setStatusCode(201);
    }

    /**
     * @param Request $request
     * @param StoreMePassword $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function password(Request $request, StoreMePassword $password)
    {
        $user = $request->user();
        $user->update($password->all());
        return response()->json()->setStatusCode(201);
    }
}
