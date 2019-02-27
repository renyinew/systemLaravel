<?php

namespace App\Http\Controllers\Admin\Api\Rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Api\Controller;
use App\Models\Admin\Api\Menu;
use App\Http\Requests\Admin\Api\Rbac\StoreMenuCreate;
use App\Http\Requests\Admin\Api\Rbac\StoreMenuUpdate;
use App\Http\Resources\Admin\Api\Rbac\MenuResource;

/**
 * @Resource("menu")
 */
class MenuController extends Controller
{
    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function select(Menu $menu)
    {
        //获取包含顶级的所有树状数据
        $menus = $menu->findOrFail(1)->thisMenu->toArray();
        $menus = [$menus];
        $array = $this->recursive($menus);
        //数组生成json响应
        return response()->json($array)->setStatusCode(200);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function sidebar(Menu $menu)
    {
        //获取不含顶级的所有树状数据
        $menus = $menu->findOrFail(1)->childMenu->toArray();
        return response()->json($menus)->setStatusCode(200);
    }

    /**
     * @param StoreMenuCreate $create
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(StoreMenuCreate $create, Menu $menu)
    {
        $model = $menu->create($create->all());
        $response = new MenuResource($model);
        return response()->json($response)->setStatusCode(201);
    }

    /**
     * @param $id
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($id, Menu $menu)
    {
        $model = $menu->findOrFail($id);
        $response = new MenuResource($model);
        return response()->json($response)->setStatusCode(201);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Menu $menu)
    {
        $menus = $menu->findOrFail(1)->childMenu->toArray();
        return response()->json($menus)->setStatusCode(200);
    }

    /**
     * @param $id
     * @param StoreMenuUpdate $update
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreMenuUpdate $update, Menu $menu)
    {
        $menu->findOrFail($id)->update($update->all());
        return response()->json()->setStatusCode(201);
    }

    /**
     * @param $id
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Menu $menu)
    {
        $menu->findOrFail($id)->delete();
        return response()->json()->setStatusCode(201);
    }

    /**
     * 递归函数处理
     * @param $data
     * @param int $n
     * @return array
     */
    protected function recursive($data, $n = 0)
    {
        $array = [];
        foreach($data as $key => $value) {
            $array[] = [ $value['id'] => str_repeat('|--', $n) . $value['name'] ];
            if(!empty($value['child_menu'])) {
                $array = array_merge($array, $this->recursive($value['child_menu'], $n+1));
            }
        }

        return $array;
    }
}
