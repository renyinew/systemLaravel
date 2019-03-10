<?php

namespace App\Http\Controllers\Admin\Api\Category;

use App\Models\Admin\Api\Category;
use App\Http\Controllers\Admin\Api\Controller;

class ArticleController extends Controller
{
    /**
     * @param Category $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function select(Category $menu)
    {
        //获取包含顶级的所有树状数据
        $menus = $menu->findOrFail(1)->thisMenu->toArray();
        $menus = [$menus];
        $array = $this->recursive($menus, 0, 1);
        //数组生成json响应
        return response()->json($array)->setStatusCode(200);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Category $category)
    {
        $menus = $category->findOrFail(1)->childMenu->toArray();
        return response()->json($menus)->setStatusCode(200);
    }

    /**
     * 递归函数处理
     * @param $data
     * @param int $n
     * @param int $type
     * @return array
     */
    protected function recursive($data, $n = 0, $type = 1)
    {
        $array = [];
        foreach($data as $key => $value) {
            if($type === $value['type'] || $value['type'] === null ) {
                $array[] = [$value['id'] => str_repeat('|--', $n) . $value['name']];
                if (!empty($value['child_menu'])) {
                    $array = array_merge($array, $this->recursive($value['child_menu'], $n + 1, $type));
                }
            }
        }
        return $array;
    }
}
