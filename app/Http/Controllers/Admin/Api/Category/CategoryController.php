<?php

namespace App\Http\Controllers\Admin\Api\Category;

use App\Models\Admin\Api\Category;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Category\CategoryResource;
use App\Http\Requests\Admin\Api\Category\StoreCategoryCreate;
use App\Http\Requests\Admin\Api\Category\StoreCategoryUpdate;

class CategoryController extends Controller
{
    /**
     * @param Category $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectArticle(Category $menu)
    {
        //获取包含顶级的所有树状数据
        $menus = $menu->findOrFail(1)->thisMenu->toArray();
        $menus = [$menus];
        $array = $this->recursive($menus, 0, 1);
        //数组生成json响应
        return response()->json($array)->setStatusCode(200);
    }

    /**
     * @param Category $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectGoods(Category $menu)
    {
        //获取包含顶级的所有树状数据
        $menus = $menu->findOrFail(1)->thisMenu->toArray();
        $menus = [$menus];
        $array = $this->recursive($menus, 0, 0);
        //数组生成json响应
        return response()->json($array)->setStatusCode(200);
    }

    /**
     * @param Category $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Category $menu)
    {
        //获取包含顶级的所有树状数据
        $menus = $menu->findOrFail(1)->thisMenu->toArray();
        $menus = [$menus];
        $array = $this->recursive($menus);
        //数组生成json响应
        return response()->json($array)->setStatusCode(200);
    }

    /**
     * @param StoreCategoryCreate $create
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(StoreCategoryCreate $create, Category $category)
    {
        $category->create($create->all());
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($id, Category $category)
    {
        $model = $category->findOrFail($id);
        $response = new CategoryResource($model);
        return response()->json($response)->setStatusCode(200);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function articleList(Category $category)
    {
        $menus = $category->findOrFail(1)->childMenu->toArray();
        return response()->json($menus)->setStatusCode(200);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function goodsList(Category $category)
    {
        $menus = $category->findOrFail(1)->childMenu->toArray();
        return response()->json($menus)->setStatusCode(200);
    }

    /**
     * @param $id
     * @param StoreCategoryUpdate $update
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreCategoryUpdate $update, Category $category)
    {
        $category->findOrFail($id)->update($update->all());
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Category $category)
    {
        $category->findOrFail($id)->delete();
        return response()->json()->setStatusCode(204);
    }

    /**
     * 递归函数处理
     * @param $data
     * @param int $n
     * @param int $type
     * @return array
     */
    protected function recursive($data, $n = 0, $type = false)
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
