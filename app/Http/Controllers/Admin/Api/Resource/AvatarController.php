<?php

namespace App\Http\Controllers\Admin\Api\Resource;

use App\Models\Admin\Api\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Requests\Admin\Api\Resource\AvatarCreate;
use App\Http\Resources\Admin\Api\File\AvatarResource;

class AvatarController extends Controller
{
    public function create(AvatarCreate $create, File $file)
    {
        $array = [];
        // 文件路径
        $directory = 'avatar/'.date('Ymd');
        // 递归创建文件路径
        Storage::makeDirectory($directory);
        // 保存文件
        $array['path'] = $create->file('avatar')->store($directory);
        // 文件大小
        $array['size'] = Storage::size($array['path']);
        // 上传人ID
        $user = $create->user();
        $array['user_id'] = $user->id;
        // 保存到数据库
        $model = $file->create($array);
        $response = new AvatarResource($model);
        return response()->json($response)->setStatusCode(201);
    }

    public function delete()
    {

    }
}
