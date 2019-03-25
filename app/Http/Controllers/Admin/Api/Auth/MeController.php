<?php

namespace App\Http\Controllers\Admin\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Auth\MeResource;

use App\Http\Requests\Admin\Api\Auth\StoreMeUpdate;
use App\Http\Requests\Admin\Api\Auth\StoreMePassword;

/**
 * @group Me
 */
class MeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        $response = new MeResource($request->user());
        return response()->json($response)->setStatusCode(200);
    }

    /**
     * @param StoreMeUpdate $update
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, StoreMeUpdate $update)
    {
        $user = $request->user();
        $user->where(['id' => $user->id])->update($update->all());
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param Request $request
     * @param StoreMePassword $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function password(Request $request, StoreMePassword $password)
    {
        $user = $request->user();
        $user->where(['id' => $user->id])->update($password->all());
        return response()->json()->setStatusCode(200);
    }
}
